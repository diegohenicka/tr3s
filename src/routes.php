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
    })->add($auth);

    $app->get('/localizacao', function (Request $request, Response $response, array $args) {
        return $this->renderer->render($response, 'localizacao.phtml', $args);
    })->add($auth);


    $app->get('/uber', function (Request $request, Response $response, array $args) {
        $url      = "http://localhost:8181/uber/";
        $ClientID = "rFgw8cBkS7N-5gkE3Op6QoaV6bpnx55q";
        $redirecionamento = 'https://login.uber.com/oauth/v2/authorize?response_type=code&client_id='.$ClientID.'&scope=all_trips+delivery+history+history_lite+places+profile+request+request_receipt+ride_widgets&redirect_uri='.$url;
        //return $this->renderer->render($response, 'uber.phtml', $args);
        return $response->withStatus(302)->withHeader('Location', $redirecionamento);
        //var_dump($redirecionamento);


    })->add($auth);

    $app->get('/uber/{params:.*}', function (Request $request, Response $response, array $args) {

        //var_dump($_GET['code']);

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://login.uber.com/oauth/v2/token',
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => [
                client_secret => "S3pUivMp9ijIJMNvKH-Z-LMxWd8s2qd0P5vzhhv-",
                client_id=>"rFgw8cBkS7N-5gkE3Op6QoaV6bpnx55q",
                grant_type=>"authorization_code",
                redirect_uri=>"http://localhost:8181/uber/",
                code=>$_GET['code']
            ]
        ]);
        
        $res = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            //var_dump($response);
            $res = json_decode($res, true);

            //$access_token = $_GET['code'];
            $client = new Stevenmaguire\Uber\Client(array(
                'access_token' => $res["access_token"],
                'server_token' => 'HJZf1PAWDYzKJOxpW_mase8xqiABRghVtkTABplo',
                'use_sandbox'  => true, // optional, default false           
                'version'      => 'v1.2' 
            ));

            $products = $client->getProducts(array(
                'latitude' => '-30.0661275',
                'longitude' => '-51.1829802'
            ));
            $dados = [produtos => $products];
            //var_dump($dados);
            return $this->renderer->render($response, 'uber.phtml', $dados);
        }

    })->add($auth);


    $app->get('/edit_profile', function (Request $request, Response $response, array $args) {
        return $this->renderer->render($response, 'edit_profile.phtml', $args);
    });

    $app->post('/edit', function (Request $request, Response $response, array $args) {

    });

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
