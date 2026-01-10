<?php

$loggedInUserEmail = $_SESSION['user']['email'] ?? null;


renderTemplate(
  path: 'home/index.view.php',
  data: [
    'heading' => 'Homepage',
    'loggedInUserEmail' => $loggedInUserEmail
  ]
);