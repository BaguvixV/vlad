<?php

// $router->get(uri: '/4dm1n', path: 'home/index.php');
// $router->get(uri: '/about', path: 'about/index.php');
// $router->get(uri: '/habits', path: 'habit/index.php');
// $router->get(uri: '/login', path: 'login/create.php');
// $router->get(uri: '/register', path: 'register/create.php');
// $router->get(uri: '/4dm1n', path: 'admin/index.php');

// $router->get(uri: '/pieslegties', path: 'login/store.php');
// $router->get(uri: '/registreties', path: 'register/store.php');


// Declaration of routes
return [
  '/' => controller(path: 'home/index.php'),
  '/about' => controller(path: 'about/index.php'),
  '/habits' => controller(path: 'habit/index.php'),
  '/login' => controller(path: 'login/index.php'),
  '/register' => controller(path: 'register/index.php'),
  '/4dm1n' => controller(path: 'admin/index.php'),

  '/pieslegties' => controller(path: 'login/store.php'),
  '/registreties' => controller(path: 'register/store.php'),
];