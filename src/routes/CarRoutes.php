<?php

App::registerRoutes(
    routes: [
        new UrlRoute(
            pathInfo: '/',
            controller: [
                "GET" => ['CarController', 'root']
            ],
        ),
        new UrlRoute(
            pathInfo: '/api/cars',
            controller: [
                "GET" => ['CarController', 'getAllCars'] 
            ],
        ),
        new UrlRoute(
            pathInfo: '/api/cars/<int:id>',
            controller: [
                "GET" => ['CarController', 'getCar'] 
            ],
        ),
        new UrlRoute(
            pathInfo: '/api/cars/<string:filter>/<string:value>',
            controller: [
                "GET" => ['CarController', 'getAllCars'] 
            ],
        ),
    ]
);
