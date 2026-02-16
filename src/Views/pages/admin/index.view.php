<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= $heading ?></title>
    <!-- <script script="style.css"></script> -->
</head>
<body>

<?php require view(path: 'components/header.view.php'); ?>

<?php require view(path: 'components/navigation.view.php'); ?>


<h2>User list</h2>
<h3>Users (placeholder) in the system</h3>

<?php foreach ($users as $user): ?>
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


<?php require view(path: 'components/footer.view.php'); ?>

</body>