<?php namespace App;
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once __DIR__ . '/src/utils/Database.php';
require_once __DIR__ . '/src/models/Car.php';
require_once __DIR__ . '/src/utils/UrlRoute.php';
require_once __DIR__ . '/src/utils/Utils.php';
require_once __DIR__ . '/src/controllers/CarController.php';
require_once __DIR__ . '/src/routes/CarRoutes.php';

use UrlRoute;

$url = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

foreach ($carRoutes as $route) {
    if ($route->verifyUrl(url: $url)) {
        if (!$route->verifyMethod(method: $method)) {
            UrlRoute::error(message: 'Method not allowed.', code: 405);
        }
        $route->callController(method: $method);
    }
}
UrlRoute::error(message: 'Endpoint not found.', code: 404);
