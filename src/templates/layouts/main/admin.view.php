<?php require template(path: 'partials/header/index.view.php'); ?>

<?php require template(path: 'partials/navigation/index.view.php'); ?>


<h2>User list</h2>
<h3>Users (placeholder) in the system</h3>

<?php foreach($users as $user): ?>
  <p>Created At: <?= htmlspecialchars($user['created_at']); ?></p>
  <p>Name: <?= htmlspecialchars($user['name']); ?></p>
  <p>Surname: <?= htmlspecialchars($user['surname']); ?></p>
  <p>Age: <?= htmlspecialchars($user['age']); ?></p>
  <p>Email: <?= htmlspecialchars($user['email']); ?></p>
  <p>Password: <?= htmlspecialchars($user['password']); ?></p>
  <p>Phone: <?= htmlspecialchars($user['phone']); ?></p>
  <p>Bio: <?= $user['bio'] ? htmlspecialchars($user['bio']) : 'empty placeholder'; ?></p>
  <p>Is Active: <?= htmlspecialchars($user['is_active']); ?></p>
  <hr>
<?php endforeach; ?>


<?php require template(path: 'partials/footer/index.view.php'); ?>