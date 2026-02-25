<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= $heading ?></title>
    <!-- <script script="style.css"></script> -->
</head>
<body>

<?php require view(path: 'components/header.view.php'); ?>

<?php require view(path: 'components/navigation.view.php'); ?>

<?php // TODO: require view(path: 'partials/hero/profile.view.php'); ?>

<hr>

<h3><?= htmlspecialchars($user['name']); ?>'s Profile Info</h3>
<p><strong>Created At:</strong> <?= htmlspecialchars($user['created_at']); ?></p>
<p><strong>Name:</strong> <?= htmlspecialchars($user['name']); ?></p>
<p><strong>Surname:</strong> <?= htmlspecialchars($user['surname']); ?></p>
<p><strong>Age:</strong> <?= htmlspecialchars($user['age']); ?></p>
<p><strong>Email:</strong> <?= htmlspecialchars($user['email']); ?></p>
<p><strong>Phone:</strong> <?= htmlspecialchars($user['phone']); ?></p>
<p><strong>Is Active:</strong> <?= htmlspecialchars($user['is_active']); ?></p>

<hr>

<?php require view(path: 'components/footer.view.php'); ?>

</body>