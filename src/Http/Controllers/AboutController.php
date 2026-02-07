<?php

namespace Http\Controllers;


class AboutController extends \Core\Controller
{
  // render about page view
  public function index()
  {
    $loggedInUserEmail = $_SESSION['user']['email'] ?? null;

    $this->renderView(
      path: 'about/index.view.php',
      data: [
       'heading' => 'About page',
       'loggedInUserEmail' => $loggedInUserEmail
      ]
    );
  }
}