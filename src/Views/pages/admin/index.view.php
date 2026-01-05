<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?= $heading ?></title>
  <!-- <script script="style.css"></script> -->
</head>
<body>

  <?php require view(path: 'layouts/header/index.view.php'); ?>

  <?php require view(path: 'layouts/navigation/index.view.php'); ?>

  <?php require view(path: 'layouts/main/admin.view.php'); ?>

  <?php require view(path: 'layouts/footer/index.view.php'); ?>

</body>