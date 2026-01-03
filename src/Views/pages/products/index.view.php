<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?= $heading ?></title>
  <!-- <script script="style.css"></script> -->
</head>
<body>

  <?php require view(path: 'layouts/header.view.php'); ?>

  <?php require view(path: 'layouts/navigation.view.php'); ?>

  <h2>Product list</h2>

  <?php foreach($products as $product): ?>
    <p>Title: <?= $product->title; ?></p>
    <p>Description: <?= $product->description; ?></p>
    <p>Price: <?= $product->price; ?></p>
    <br>
  <?php endforeach; ?>

  <?php require view(path: 'layouts/footer.view.php'); ?>

</body>