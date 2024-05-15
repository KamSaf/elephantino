<?php

$carRoutes = [
    new UrlRoute(
        pathInfo: '/',
        urlReg: "/\/$/",
        controller: [
            "GET" => ['CarController', 'root'] 
        ],
    ),
    new UrlRoute(
        pathInfo: '/api/cars',
        urlReg: "/\/api\/cars$/",
        controller: [
            "GET" => ['CarController', 'getAllCars'] 
        ],
    ),
];
