<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?= $heading ?></title>
  <!-- <script script="style.css"></script> -->
</head>
<body>

  <?php require view(path: 'layouts/header.view.php'); ?>

  <?php require view(path: 'layouts/navigation.view.php'); ?>

  <h2>User list</h2>
  <?php foreach($users as $user): ?>
    <p>Name: <?= $user->name; ?></p>
    <p>Surname: <?= $user->surname; ?></p>
    <p>Age: <?= $user->age; ?></p>
    <p>Email: <?= $user->email; ?></p>
    <br>
  <?php endforeach; ?>

  <?php require view(path: 'layouts/footer.view.php'); ?>

</body>