<?php require template(path: 'partials/header/index.view.php'); ?>

<?php require template(path: 'partials/navigation/index.view.php'); ?>


<h2>User list</h2>
<h3>Users (placeholder) in the system</h3>

<?php foreach($users as $user): ?>
  <p>Date: <?= $user['created_at']; ?></p>
  <p>Name: <?= $user['name']; ?></p>
  <p>Surname: <?= $user['surname']; ?></p>
  <p>Age: <?= $user['age']; ?></p>
  <p>Email: <?= $user['email']; ?></p>
  <p>Password: <?= $user['password']; ?> <strong>NOTE: This will be hashed later on when creating new user!</strong></p>
  <p>Phone: <?= $user['phone']; ?></p>
  <p>Bio: <?= $user['bio']; ?></p>
  <p>Is Active: <?= $user['is_active']; ?></p>
  <hr>
<?php endforeach; ?>


<?php require template(path: 'partials/footer/index.view.php'); ?>