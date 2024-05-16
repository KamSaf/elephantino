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
        urlReg: "/^\/api\/cars$/",
        controller: [
            "GET" => ['CarController', 'getAllCars'] 
        ],
    ),
    new UrlRoute(
        pathInfo: '/api/cars/:id',
        urlReg: "/^\/api\/cars(?:\/([0-9]+))?$/",
        controller: [
            "GET" => ['CarController', 'getCar'] 
        ],
    ),
];
