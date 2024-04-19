<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once $_SERVER['DOCUMENT_ROOT'] . '/src/utils/Utils.php';



echo json_encode(
    array(
        'Avaible endpoints' =>
        array(
            'GET' =>
            array(
                '/cars/' => 'Fetch all cars from database',
                '/cars/:id/' => 'Fetch car by id',
                '/cars_by_make/:make/' => 'Fetch cars by Make',
                '/cars_by_model/:model/' => 'Fetch cars by Model',
                '/cars_by_color/:color/' => 'Fetch cars by Color',
                '/cars_by_year/:year/' => 'Fetch cars by Production year',
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
