<?php

namespace Core;

// $router->get('/4dm1n', 'controllers/admin.php');
// $router->get('/home', 'controllers/home.php');
// $router->get('/products', 'controllers/products.php');
// $router->get('/about', 'controllers/about.php');


$uri = $_SERVER['REQUEST_URI'];

if ($uri === '/') {
  require controller(path: 'home.php');
} else if ($uri === '/about') { 
  require controller(path: 'about.php');
} else if ($uri === '/habits') { 
  require controller(path: 'habit.php');
} else if ($uri === '/4dm1n') { 
  require controller(path: 'admin.php');
} else {
  dd($uri);
}