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
        $url = getUrl();
        if (array_key_exists(2, $url) && array_key_exists(3, $url)) {
            $cars = Car::findAll(filter: $url[2], value: $url[3]);
        } else {
            $cars = Car::findAll();
        }
        $jsonData = [
            'code' => 200,
            'data' => []
        ];
        foreach ($cars as $car) {
            array_push($jsonData['data'], $car->getData());
        }
        echo json_encode($jsonData);
        exit;
    }

    public static function getCar(): void
    {
        $url = getUrl();
        if (array_key_exists(2, $url)) {
            if (!is_numeric($url[2])) {
                UrlRoute::error('Invalid id parameter type.', code: 422);
            }
            $id = (int)$url[2];
            try {
                $jsonData = [
                    'code' => 200,
                    'data' => Car::find(id: $id)->getData()
                ];
            } catch (Exception $e) {
                UrlRoute::error($e->getMessage(), code: 404);
            }
        }
        echo json_encode($jsonData);
        exit;
    }

}
