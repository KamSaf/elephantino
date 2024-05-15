<?php
namespace Src\Controllers;
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/models/Car.php';

use Src\Models\Car;

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
