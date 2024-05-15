<?php
namespace Src\Routes;
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/utils/UrlRoute.php';

use Src\Utils\UrlRoute;

$carRoutes = array(
    new UrlRoute(
        urlReg: "/\/api\/cars$/",
        controller: ['CarController', 'getAllCars'],
        httpMethods: ["GET"]
    ),
);