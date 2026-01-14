<?php

$loggedInUserEmail = $_SESSION['user']['email'] ?? null;


renderView(
  path: 'auth/register/index.view.php',
  data: [
   'heading' => 'Register Page',
   'loggedInUserEmail' => $loggedInUserEmail
  ]
);