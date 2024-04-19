<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once $_SERVER['DOCUMENT_ROOT'] . '/src/utils/Utils.php';

echo json_encode(getUrlParams());






// echo json_encode(
//     array(
//         'GET endpoints' =>
//         array(
//             '/cars/' => 'Fetch all cars from database',
//             '/cars/:id/' => 'Fetch car by id',
//             '/cars_by_make/:make/' => 'Fetch cars by Make',
//             '/cars_by_model/:model/' => 'Fetch cars by Model',
//             '/cars_by_color/:color/' => 'Fetch cars by Color',
//             '/cars_by_year/:year/' => 'Fetch cars by Production year',
//         ),
//         'POST endpoints' =>
//         array(
//             '/cars/' => 'Save new car to the database',
//         ),
//         'PUT endpoints' =>
//         array(
//             '/cars/:id/' => 'Override car data in database',
//         ),
//         'DELETE endpoints' =>
//         array(
//             '/cars/:id/' => 'Delete car from database',
//         )
//     )
// );
