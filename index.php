<?php
header('Access-Control-Allow-Origin: *');
require_once __DIR__ . '/src/core/App.php';
use App;

$app = new App();
$app->setHeader();
$app->run();
