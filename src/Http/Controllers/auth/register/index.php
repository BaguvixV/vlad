<?php

$loggedInUserEmail = $_SESSION['user']['email'] ?? null;


renderTemplate(
  path: 'auth/register/index.view.php',
  data: [
   'heading' => 'Register Page',
   'loggedInUserEmail' => $loggedInUserEmail
  ]
);