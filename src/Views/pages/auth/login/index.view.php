<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?= $heading ?></title>
  <!-- <script script="style.css"></script> -->
</head>
<body>

  <?php require view(path: 'components/header.view.php'); ?>

  <?php require view(path: 'components/navigation.view.php'); ?>

  <?php require view(path: 'partials/forms/login.view.php'); ?>

  <?php require view(path: 'components/footer.view.php'); ?>

</body>