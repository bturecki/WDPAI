<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'AppController');
Router::get('projects', 'AppController');
Router::post('login', 'SecurityController');

Router::run($path);