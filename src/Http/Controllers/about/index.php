<?php

$loggedInUserEmail = $_SESSION['user']['email'] ?? null;


renderView(
  path: 'about/index.view.php',
  data: [
   'heading' => 'About page',
   'loggedInUserEmail' => $loggedInUserEmail
  ]
);