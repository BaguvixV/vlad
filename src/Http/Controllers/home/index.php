<?php

$loggedInUserEmail = $_SESSION['user']['email'] ?? null;


renderView(
  path: 'home/index.view.php',
  data: [
    'heading' => 'Homepage',
    'loggedInUserEmail' => $loggedInUserEmail
  ]
);