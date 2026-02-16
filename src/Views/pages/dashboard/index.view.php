<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= $heading ?></title>
    <!-- <script script="style.css"></script> -->
</head>
<body>

<?php require view(path: 'components/header.view.php'); ?>

<?php require view(path: 'components/navigation.view.php'); ?>

<?php // require template(path: 'partials/hero/habit.view.php'); ?>
<h2>Welcome to the Habit Tracker, <i style="color:green"><?= htmlspecialchars($username); ?></i>.</h2>

<p>Profile page content will grows as your motivatioon too.</p>

<hr>


<h3><?= htmlspecialchars($username); ?>'s Profile Info</h3>
<p><strong>Created At:</strong> <?= htmlspecialchars($user['created_at']); ?></p>
<p><strong>Name:</strong> <?= htmlspecialchars($user['name']); ?></p>
<p><strong>Surname:</strong> <?= htmlspecialchars($user['surname']); ?></p>
<p><strong>Age:</strong> <?= htmlspecialchars($user['age']); ?></p>
<p><strong>Email:</strong> <?= htmlspecialchars($user['email']); ?></p>
<p><strong>Phone:</strong> <?= htmlspecialchars($user['phone']); ?></p>
<p><strong>Is Active:</strong> <?= htmlspecialchars($user['is_active']); ?></p>

<hr>


<?php // require template(path: 'partials/lists/habit-list.view.php'); ?>
<h2>All Created Habit Stats</h2>

<?php if (!isset($habits)) : ?>
    <h3 style="color:crimson">There are no created habits</h3>
<?php else : ?>
    <?php foreach ($habits as $habit): ?>
        <p>Date: <?= $habit['created_at']; ?></p>
        <p>Category: <?= $habit['category']; ?></p>
        <p>Completion: <?= $habit['completion']; ?></p>
        <p>Title: <?= $habit['title']; ?></p>
        <p>Description: <?= $habit['description']; ?></p>
        <p>Is Active: <?= $habit['is_active']; ?></p>


        <?php // require view(path: 'partials/forms/habit-show.view.php'); ?>
        <h3>Show this habit</h3>
        <form action="/habit/<?= $habit['habit_id']; ?>" method="GET">
            <div>
                <button type="submit">🔎Show</button>
            </div>
        </form>

        <hr>

    <?php endforeach; ?>
<?php endif; ?>


<?php require view(path: 'components/footer.view.php'); ?>

</body>