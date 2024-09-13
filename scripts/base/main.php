<?php

use Elephantino\Core\App;
use Elephantino\Http\Response;

$app = new App();

$app->get(
    "/",
    fn() => Response::json(['message' => 'Hello'])
);

$app->run(debug: true);
