<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('cars', 'CarController');
Router::post('login', 'SecurityController');
Router::post('addCar', 'CarController');
Router::post('register', 'SecurityController');
Router::post('search', 'CarController');

Router::run($path);