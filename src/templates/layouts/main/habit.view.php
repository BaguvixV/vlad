<?php require template(path: 'partials/header/index.view.php'); ?>

<?php require template(path: 'partials/navigation/index.view.php'); ?>


<h2>Habit Stats</h2>

<?php foreach($habits as $habit): ?>
  <p>Date: <?= $habit['created_at']; ?></p>
  <p>Category: <?= $habit['category']; ?></p>
  <p>Status: <?= $habit['status']; ?></p>
  <p>Title: <?= $habit['title']; ?></p>
  <p>Description: <?= $habit['description']; ?></p>
  <p>Is Active: <?= $habit['is_active']; ?></p>
  <hr>
<?php endforeach; ?>


<?php require template(path: 'partials/footer/index.view.php'); ?>