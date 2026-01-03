<?php

use Core\Database;


$pdo = new Database();


renderView(
  path: 'home/index.view.php',
  data: [
   'heading' => 'Homepage'
  ]
);