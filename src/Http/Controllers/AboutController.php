<?php

namespace Http\Controllers;

use Core\Auth;

class AboutController extends \Core\Controller
{
   // render about page view
   public function index()
   {
      $this->renderView(
         path: 'about/index.view.php',
         data: [
            'heading' => 'About page',
            'loggedInUserEmail' => Auth::email()
         ]
      );
   }
}