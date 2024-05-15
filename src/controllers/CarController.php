<?php

class CarController
{
    public static function root(): void
    {
        UrlRoute::endpoints();
        exit;
    }

    public static function getAllCars(): void
    {
        $jsonData = [];
        foreach (Car::findAll() as $car) {
            array_push($jsonData, $car->getData());
        }
        echo json_encode($jsonData);
        exit;
    }

    public static function getCar(): void
    {
        $id = (int) getUrl()[2];
        echo json_encode(Car::find(id: $id)->getData());
        exit;
    }

}
