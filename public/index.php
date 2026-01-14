<?php

declare(strict_types= 1);

// session_start();
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

// BASE_PATH points to project root inside container
const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'src/Core/functions.php';
require core(path: 'autoloader.php');
require core(path: 'Database.php');
require core(path: 'Router.php');


$router = new \Core\Router();

// Get route path from routes.php file
$routes = require core(path: 'routes.php');

// Parsing of the uri
$uri = parse_url(url: $_SERVER['REQUEST_URI'])['path'];
// Get the method
$method = $_POST['__spoof_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route(uri: $uri, method: $method);