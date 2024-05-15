<?php

class CarController
{
    public static function root()
    {
        UrlRoute::endpoints();
        exit;
    }

    public static function getAllCars()
    {
        $jsonData = [];
        foreach (Car::findAll() as $car) {
            array_push($jsonData, $car->getData());
        }
        echo json_encode($jsonData);
        exit;
    }
}
