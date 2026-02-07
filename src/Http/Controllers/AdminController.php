<?php

namespace Http\Controllers;

use Core\Config;
use Core\Database;
use Models\Users;


class AdminController extends \Core\Controller
{
  // render about page view
  public function index()
  {
    $loggedInUserEmail = $_SESSION['user']['email'] ?? null;

    $db = new Database(Config::Database());
    $pdo = $db->connect();

    $userModel = new Users(connection: $pdo);
    $users = $userModel->read();

    $this->renderView(
      path: 'admin/index.view.php',
      data: [
        'heading' => 'Admin page',
        'loggedInUserEmail' => $loggedInUserEmail,
        'users' => $users
      ]
    );
  }
}