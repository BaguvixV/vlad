<?php

$loggedInUserEmail = $_SESSION['user']['email'] ?? null;


renderView(
  path: 'auth/login/index.view.php',
  data: [
   'heading' => 'Login Page',
   'loggedInUserEmail' => $loggedInUserEmail
  ]
);