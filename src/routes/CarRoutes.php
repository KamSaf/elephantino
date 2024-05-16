<?php

$carRoutes = [
    new UrlRoute(
        pathInfo: '/',
        urlReg: "/^\/$/",
        controller: [
            "GET" => ['CarController', 'root']
        ],
    ),
    new UrlRoute(
        pathInfo: '/api/cars',
        urlReg: "/^\/api\/cars?(?:\/)?$/",
        controller: [
            "GET" => ['CarController', 'getAllCars'] 
        ],
    ),
    new UrlRoute(
        pathInfo: '/api/cars/:id',
        urlReg: "/^\/api\/cars\/([0-9]+)(?:\/)?$/",
        controller: [
            "GET" => ['CarController', 'getCar'] 
        ],
    ),
    new UrlRoute(
        pathInfo: '/api/cars/:filter/:value',
        urlReg: "/^\/api\/cars\/([0-9a-zA-Z]+)\/([0-9a-zA-Z\-]+)(?:\/)?$/",
        controller: [
            "GET" => ['CarController', 'getAllCars'] 
        ],
    ),
];
