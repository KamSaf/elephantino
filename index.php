<?php

$rootPath = $_SERVER['DOCUMENT_ROOT'];
require "{$rootPath}/src/App.php";

use App;

$app = new App();
$app->setHeader();

$app->get(
    "/",
    function () {
        return json_encode(
            [
                'code' => 200,
                'body' => "Hello",
            ]
        );

    }
);

$app->run();
