<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?= $heading ?></title>
  <!-- <script script="style.css"></script> -->
</head>
<body>

  <?php require view(path: 'components/header.view.php'); ?>

  <?php require view(path: 'components/navigation.view.php'); ?>


  <h2>Welcome to the Habit Tracker</h2>

  <p>Track your daily habits and build positive routines with our web application.</p>


  <?php require view(path: 'components/footer.view.php'); ?>

</body>