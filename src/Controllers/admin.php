<?php

use Models\User;


$users = [];

$user = new User();


$user->name = 'jesse';
$user->surname = 'pinkman';
$user->age = 23;
$user->email = 'pinkman@gmail.com';

$users[] = $user;

$user->name = 'john';
$user->surname = 'silverhand';
$user->age = 2077;
$user->email = 'silverhand@gmail.com';

$users[] = $user;

$user->name = 'jarvis';
$user->surname = 'smith';
$user->age = 45;
$user->email = 'smith@gmail.com';

$users[] = $user;


renderView(
  path: 'admin/index.view.php',
  data: [
   'heading' => 'Admin page',
   'users' => $users
  ]
);