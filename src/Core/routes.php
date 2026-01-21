<?php

$router->get(uri: '/', controller: 'home/index.php');
$router->get(uri: '/about', controller: 'about/index.php');

$router->get(uri: '/4dm1n', controller: 'admin/index.php');

$router->get(uri: '/register', controller: 'auth/register/create.php');
$router->post(uri: '/register', controller: 'auth/register/store.php');

$router->get(uri: '/login', controller: 'auth/login/create.php');
$router->post(uri: '/login', controller: 'auth/login/store.php');
$router->get(uri: '/logout', controller: 'auth/login/logout.php');

$router->get(uri: '/dashboard', controller: 'dashboard/index.php');

$router->get(uri: '/habit', controller: 'habit/create.php');
$router->post(uri: '/habit', controller: 'habit/store.php');
$router->get(uri: '/habit/{id}', controller: 'habit/show.php');
$router->patch(uri: '/habit/{id}', controller: 'habit/patch.php');
$router->put(uri: '/habit/{id}', controller: 'habit/put.php');

$router->get(uri: '/archived', controller: 'habit/archived.php');
$router->delete(uri: '/archived/{id}', controller: 'habit/destroy.php');
$router->patch(uri: '/archived/{id}', controller: 'habit/restore.php');