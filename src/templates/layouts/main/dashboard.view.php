<?php require template(path: 'partials/header/index.view.php'); ?>

<?php require template(path: 'partials/navigation/index.view.php'); ?>


<h2>Welcome to the Habit Tracker, <i style="color:green"><?=  htmlspecialchars($username); ?></i>.</h2>

<p>Profile page content will grows as your motivatioon too.</p>

<hr>

<h3><?=  htmlspecialchars($username); ?>'s Profile Info</h3>
<p><strong>Created At:</strong> <?= htmlspecialchars($user['created_at']); ?></p>
<p><strong>Name:</strong> <?= htmlspecialchars($user['name']); ?></p>
<p><strong>Surname:</strong> <?= htmlspecialchars($user['surname']); ?></p>
<p><strong>Age:</strong> <?= htmlspecialchars($user['age']); ?></p>
<p><strong>Email:</strong> <?= htmlspecialchars($user['email']); ?></p>
<p><strong>Phone:</strong> <?= htmlspecialchars($user['phone']); ?></p>
<p><strong>Is Active:</strong> <?= htmlspecialchars($user['is_active']); ?></p>

<hr>

<?php require template(path: 'partials/footer/index.view.php'); ?>