<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/src/utils/UrlRoute.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/controllers/CarController.php';


$carRoutes = array(
    new UrlRoute(
        urlReg: "/\/api\/cars$/",
        controller: ['CarController', 'getAllCars'],
        httpMethods: ["GET"]
    ),
);