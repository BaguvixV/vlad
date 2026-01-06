<?php

namespace Core;

// Parsing of the uri
$uri = parse_url(url: $_SERVER['REQUEST_URI'])['path'];

// Get route path from routes.php file
$routes = require core(path: 'routes.php');


routeToController(uri: $uri, routes: $routes);