<?php

use Models\Product;


$products = [];

$product = new Product();


$product->title = 'laptop';
$product->description = 'high-end performance laptop';
$product->price = 1500;

$products[] = $product;


$product->title = 'pc';
$product->description = 'mid-level performance PC';
$product->price = 667;

$products[] = $product;

$product->title = 'tablet';
$product->description = 'regular tablet for everyday tasks';
$product->price = 500;

$products[] = $product;


renderView(
  path: 'products/index.view.php',
  data: [
   'heading' => 'Product list',
   'products' => $products
  ]
);