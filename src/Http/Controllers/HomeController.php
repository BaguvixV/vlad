<?php

namespace Http\Controllers;

use Core\Auth;

class HomeController extends \Core\Controller
{
   // render main homepage view
   public function index()
   {
      $this->renderView(
         path: 'home/index.view.php',
         data: [
            'heading' => 'Homepage',
            'loggedInUserEmail' => Auth::email()
         ]
      );
   }
}