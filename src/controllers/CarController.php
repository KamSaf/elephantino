<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/src/models/Car.php';

class CarController
{
    public static function getAllCars()
    {
        $jsonData = array();
        foreach (Car::findAll() as $car) {
            array_push($jsonData, $car->getData());
        }
        echo json_encode($jsonData);
    }
}
