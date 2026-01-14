<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?= $heading ?></title>
  <!-- <script script="style.css"></script> -->
</head>
<body>

  <?php require view(path: 'components/header.view.php'); ?>

  <?php require view(path: 'components/navigation.view.php'); ?>


  <h2>About this Habit Tracker project</h2>

  <p>This project is a web application designed to help users track their daily habits and build positive routines. It allows users to create, manage, and monitor their habits over time, providing insights into their progress and helping them achieve their personal goals.</p>

  <?php require view(path: 'components/footer.view.php'); ?>

</body>