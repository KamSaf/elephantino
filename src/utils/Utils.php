<?php

function getUrlParams(): array
{
    $url = $_SERVER['REQUEST_URI'];
    $arr = explode('/', substr($url, 1, strlen($url)));
    return $arr;
}

function echoEndpointsList(): void
{
    echo json_encode(
        array(
            'Available endpoints' =>
            array(
                'GET' =>
                array(
                    '/cars/' => 'Fetch all cars from database',
                    '/cars/:id/' => 'Fetch car by id',
                    '/cars_by_make/:make/' => 'Fetch cars by Make',
                    '/cars_by_model/:model/' => 'Fetch cars by Model',
                    '/cars_by_color/:color/' => 'Fetch cars by Color',
                ),
                'POST' =>
                array(
                    '/cars/' => 'Save new car to the database',
                ),
                'PUT' =>
                array(
                    '/cars/:id/' => 'Override car data in database',
                ),
                'DELETE' =>
                array(
                    '/cars/:id/' => 'Delete car from database',
                )
            )
        )
    );
    return;
}
