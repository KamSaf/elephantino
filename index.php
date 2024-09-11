<?php

$rootPath = $_SERVER['DOCUMENT_ROOT'];
require_once "{$rootPath}/src/App.php";
require_once "{$rootPath}/src/utils/Response.php";
require_once "{$rootPath}/src/Router.php";

$app = new App();
$router = new Router();

$router->get(
    "/",
    function () {
        Response::json(
            ["message" => 'Hello from the router!']
        );
    }
);

$app->get(
    "/",
    function () {
        Response::json(
            ["message" => 'Hello']
        );
    }
);

$app->include("router", $router);
$app->run();
