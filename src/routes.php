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


    $app->post('/cadastro', function (Request $request, Response $response, array $args) {
        $data = [
            'user'=>filter_input(INPUT_POST, 'user'),
            'email'=>filter_input(INPUT_POST, 'email'),
            'name'=>filter_input(INPUT_POST, 'nome'),
            'pass'=>filter_input(INPUT_POST, 'pass'),
            'gender'=>filter_input(INPUT_POST, 'gender')
          ];        
        //var_dump($data);
        $table = $this->db->table('user');
        $user = $table->insert($data);

        return $response->withStatus(302)->withHeader('Location', '/');
        //return $this->renderer->render($response, 'index.phtml', $args);
    });


    $app->map(['GET', 'POST'] ,'/login', function(Request $request, Response $response, array $args) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = filter_input(INPUT_POST, 'user');
            $pass = filter_input(INPUT_POST, 'pass');

            $table = $this->db->table('user');
            $users = $table->where([
              'user' => $user,
              'pass' => $pass
            ])->get();
            if ($users->count()) {
              $_SESSION['user'] = (array)$users->first();
              return $response->withStatus(302)->withHeader('Location', '/home');
            }
          }
          return $response->withStatus(302)->withHeader('Location', '/');
    });
};
