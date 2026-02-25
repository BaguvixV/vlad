<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= $heading ?></title>
    <!-- <script script="style.css"></script> -->
</head>
<body>

<?php require view(path: 'components/header.view.php'); ?>

<?php require view(path: 'components/navigation.view.php'); ?>


<?php // require view(path: 'partials/forms/habit-show.view.php'); ?>
<h3>Habit: <i>"<?= htmlspecialchars($habit['title']); ?>"</i></h3>
<p><strong>ID:</strong> <?= htmlspecialchars($habit['habit_id']); ?></p>
<p><strong>Created At:</strong> <?= htmlspecialchars($habit['created_at']); ?></p>
<p><strong>Completion:</strong> <?= htmlspecialchars($habit['completion']); ?></p>
<p><strong>Title:</strong> <?= htmlspecialchars($habit['title']); ?></p>
<p><strong>Description:</strong> <?= htmlspecialchars($habit['description']); ?></p>
<p><strong>Is Active:</strong> <?= htmlspecialchars($habit['is_active']); ?></p>

<?php // require view(path: 'partials/forms/habit-soft-delete.view.php'); ?>
<form action="/habit/<?= htmlspecialchars($habit['habit_id']); ?>" method="POST"
      onsubmit="return confirm('Are you sure you want to soft-delete habit Nr.<?= htmlspecialchars($habit['habit_id']); ?>?');">
    <input type="hidden" name="__spoof_method" value="PATCH">

    <div>
        <button type="submit">🗑️ Soft-delete</button>
    </div>
</form>

<hr>

<?php // require view(path: 'partials/forms/habit-edit.view.php'); ?>
<h3>Edit Habit</h3>

<form action="/habit/<?= htmlspecialchars($habit['habit_id']); ?>" method="POST">
    <input type="hidden" name="__spoof_method" value="PUT">

    <?php if (isset($generalError)) : ?>
        <p style="color:red;font-weight:bold;font-style: italic;"><?= $generalError; ?></p>
    <?php endif; ?>

    <?php if (isset($error['category'])) : ?>
        <p style="color:red;font-weight:bold;font-style: italic;"><?= $error['category']; ?></p>
    <?php endif; ?>
    <div>
        <label for="category">Category</label>
        <input type="text" name="category">
    </div>

    <?php if (isset($error['title'])) : ?>
        <p style="color:red;font-weight:bold;font-style: italic;"><?= $error['title']; ?></p>
    <?php endif; ?>
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" value="<?= $old['title'] ?? ''; ?>">
    </div>

    <?php if (isset($error['description'])) : ?>
        <p style="color:red;font-weight:bold;font-style: italic;"><?= $error['description']; ?></p>
    <?php endif; ?>
    <div>
        <label for="description">Description</label>
        <input type="text" name="description" value="<?= $old['description'] ?? ''; ?>">
    </div>

    <div>
        <button type="submit">🎨 Edit</button>
    </div>
</form>

<hr>


<?php require view(path: 'components/footer.view.php'); ?>

</body>