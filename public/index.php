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