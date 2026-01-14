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
  '/dashboard' => controller(path: 'dashboard/index.php'),

  '/4dm1n' => controller(path: 'admin/index.php'),

  '/create-habit' => controller(path: 'habit/create.php'),
  '/store-habit' => controller(path: 'habit/store.php'),
  '/show-habit' => controller(path: 'habit/show.php'),
  '/edit-habit' => controller(path: 'habit/edit.php'),
  '/destroy-habit' => controller(path: 'habit/destroy.php'),

  '/login' => controller(path: 'auth/login/index.php'),
  '/register' => controller(path: 'auth/register/index.php'),
  '/registreties' => controller(path: 'auth/register/store.php'),
  '/pieslegties' => controller(path: 'auth/login/store.php'),
  '/izlogoties' => controller(path: 'auth/login/destroy.php'),
];