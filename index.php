<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once $_SERVER['DOCUMENT_ROOT'] . '/src/routes/CarRoutes.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/controllers/CarController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/utils/Utils.php';


$routes = array_merge(
    $carRoutes,
);

$url = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
if ($url === '/') {
    echoEndpointsList();
}

foreach ($routes as $route) {
    if ($route->verifyMethod(method: $method) && $route->verifyUrl(url: $url)) {
        $route->callController();
    }
}
