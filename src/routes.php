<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {


    $auth = function ($request, $response, $next) {
        if (isset($_SESSION['user']) and is_array($_SESSION['user'])) {
            $response = $next($request, $response);
        } else {
            $response = $response->withStatus(401)->write('Page protected');
        }
        return $response;
    };



    $app->get('/', function (Request $request, Response $response, array $args) {
        // Sample log message
        //$container->get('logger')->info("Slim-Skeleton '/' route");

        // Render index view
        //return $container->get('renderer')->render($response, 'index.phtml', $args);

        return $this->renderer->render($response, 'index.phtml', $args);
    })/*->add($auth)*/;

    $app->get('/home', function (Request $request, Response $response, array $args) {
        return $this->renderer->render($response, 'home.phtml', $args);
    });

    $app->get('/edit_profile', function (Request $request, Response $response, array $args) {
        return $this->renderer->render($response, 'edit_profile.phtml', $args);
    });

    $app->post('/edit', function (Request $request, Response $response, array $args) {

        $userid = $_SESSION['user']['id'];
        $data = [
            'state'=>filter_input(INPUT_POST, 'state'),
            'city'=>filter_input(INPUT_POST, 'city'),
            'descr'=>filter_input(INPUT_POST, 'descr'),
            'contact'=>filter_input(INPUT_POST, 'contact'),
            'id' => $userid
        ];

        $table = $this->db->table('user');
        $user = $table->update($data);

        $img_file = $_FILES["fileToUpload"]["name"];
        $target_dir = "photos/";
        $target_file = $target_dir . basename($img_file);
        $file_ext = substr($img_file, strripos($img_file, '.')); // This returns file ext
        $newfilename = mt_rand().round(microtime(true)) . $file_ext;
        $destino = $target_dir.$newfilename;

        if
        (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $destino)) {
            $data = [
                'userid'=>$userid,
                'name'=>$newfilename,
            ];

            $table = $this->db->table('album');
            $album = $table->insert($data);
        }
        $_SESSION['userAlbum'] = $newfilename;
        return $response->withStatus(302)->withHeader('Location', '/home');
    });

    $app->post('/cadastro', function (Request $request, Response $response, array $args) {
        $data = [
            'user'=>filter_input(INPUT_POST, 'user'),
            'email'=>filter_input(INPUT_POST, 'email'),
            'name'=>filter_input(INPUT_POST, 'nome'),
            'pass'=>filter_input(INPUT_POST, 'pass'),
            'gender'=>filter_input(INPUT_POST, 'gender')
          ];        

        $table = $this->db->table('user');
        $user = $table->insert($data);
        if ($user) {
            return $response->withStatus(302)->withHeader('Location', '/home');
        }
        return $response->withStatus(302)->withHeader('Location', '/');
        //return $this->renderer->render($response, 'index.phtml', $args);
    });

    $app->map(['GET', 'POST'] ,'/login', function(Request $request, Response $response, array $args) {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = filter_input(INPUT_POST, 'user');
            $pass = filter_input(INPUT_POST, 'pass');

            $table = $this->db->table('user');
            $user = $table->where([
              'user' => $user,
              'pass' => $pass
            ])->get();

            $table2 = $this->db->table('album');
            $useralbum = $table2->where([
                'userid' => $user->first()->id
                ])->get();

            if($useralbum->count()) {
                $_SESSION['userAlbum'] = (array)$useralbum->last();
            }

            if ($user->count()) {
              $_SESSION['user'] = (array)$user->first();
              return $response->withStatus(302)->withHeader('Location', '/home');
            }
          }

          return $response->withStatus(302)->withHeader('Location', '/');
    });
};
