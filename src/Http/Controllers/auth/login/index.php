<?php

$loggedInUserEmail = $_SESSION['user']['email'] ?? null;


renderTemplate(
  path: 'auth/login/index.view.php',
  data: [
   'heading' => 'Login Page',
   'loggedInUserEmail' => $loggedInUserEmail
  ]
);