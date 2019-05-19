<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {

    $app->get('/', function (Request $request, Response $response, array $args) {
        // Sample log message
        //$container->get('logger')->info("Slim-Skeleton '/' route");

        // Render index view
        //return $container->get('renderer')->render($response, 'index.phtml', $args);

        return $this->renderer->render($response, 'index.phtml', $args);
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
        try{
            $user = $table->insert($data);
        }catch(Expection $e){
            var_dump($e);
        }
        return $response->withStatus(302)->withHeader('Location', '/');
        //return $this->renderer->render($response, 'index.phtml', $args);
    });
};
