<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');


require_once $_SERVER['DOCUMENT_ROOT'] . '/src/utils/Utils.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/models/Car.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/routes/CarRoutes.php';

// $data = array();

// foreach (Car::findAll() as $car) {
//     array_push($data, $car->getData());
// }

// $car = Car::create(make: 'BMWBMWBMW11', model: 'Seria 3', color: 'Black');
// $car->setMake('Audi')->setModel('A4')->setColor('White');

// echo json_encode(
//     array(
//         'data' => $car->getData(),
//     )
// );

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
