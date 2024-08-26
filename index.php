<?php

$rootPath = $_SERVER['DOCUMENT_ROOT'];
require_once "{$rootPath}/src/App.php";
require_once "{$rootPath}/src/utils/Response.php";

$app = new App();

$app->get(
    "/",
    function () {
        Response::json(
            ["message" => 'Hello']
        );
    }
);

$app->run();
