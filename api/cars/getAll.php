<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once $_SERVER['DOCUMENT_ROOT'] . '/config/Database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/Car.php';

$conn = Database::connect();

// $car = new Car(conn: $conn);

// $result = $car->read();
// $rowCount = $result->rowCount();

// if ($rowCount > 0) {
//     $carsArr = array();
//     $carsArr['data'] = array();

//     while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
//         extract($row);
//         $car_item = array(
//             'id' => $id,
//             'make' => $make,
//             'model' => $model,
//             'color' => $color,
//             'createDate' => $createDate
//         );
//     }
// } else {
// }
