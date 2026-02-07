<?php

namespace Http\Controllers;


class HomeController extends \Core\Controller
{
  // render main homepage view
  public function index()
  {
    $loggedInUserEmail = $_SESSION['user']['email'] ?? null;

    $this->renderView(
      path: 'home/index.view.php',
      data: [
        'heading' => 'Homepage',
        'loggedInUserEmail' => $loggedInUserEmail
      ]
    );
  }
}