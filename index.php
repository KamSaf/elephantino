<?php namespace App;
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once $_SERVER['DOCUMENT_ROOT'] . '/src/utils/Database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/models/Car.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/utils/UrlRoute.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/controllers/CarController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/routes/CarRoutes.php';
use UrlRoute;

$routes = array_merge(
    $carRoutes,
);

$url = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$routeFound = false;

foreach ($routes as $route) {
    if ($route->verifyUrl(url: $url)) {
        if (!$route->verifyMethod(method: $method)) {
            UrlRoute::error(message: 'Method not allowed.', code: 405);
        }
        $routeFound = true;
        $route->callController(method: $method);
    }
}

if (!$routeFound) {
    UrlRoute::error(message: 'Endpoint not found.', code: 404);
}
