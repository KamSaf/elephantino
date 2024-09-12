<?php

$rootPath = $_SERVER['DOCUMENT_ROOT'];
require_once "{$rootPath}/src/App.php";
require_once "{$rootPath}/src/utils/Response.php";
require_once "{$rootPath}/src/Router.php";
require_once "{$rootPath}/src/utils/Request.php";

$app = new App();
$router = new Router();

$app->get(
    "/api",
    function () {
        Response::json(
            ["message" => 'Hello']
        );
    }
);

$app->get(
    '/api/:id',
    function (Request $req) {
        Response::json(
            ['message' => $req->getParams()]
        );
    }
);



$app->include('router', $router);
$app->run(debug: true);
