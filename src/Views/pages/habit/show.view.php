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
  <h3>Habit: <i>"<?=  htmlspecialchars($habit['title']); ?>"</i></h3>
  <p><strong>ID:</strong> <?= htmlspecialchars($habit['id']); ?></p>
  <p><strong>Created At:</strong> <?= htmlspecialchars($habit['created_at']); ?></p>
  <p><strong>Status:</strong> <?= htmlspecialchars($habit['status']); ?></p>
  <p><strong>Title:</strong> <?= htmlspecialchars($habit['title']); ?></p>
  <p><strong>Description:</strong> <?= htmlspecialchars($habit['description']); ?></p>
  <p><strong>Is Active:</strong> <?= htmlspecialchars($habit['is_active']); ?></p>


  <form action="/habit/<?= $habit['id']; ?>" method="POST" onsubmit="return confirm('Are you sure you want to edit habit Nr.<?= $habit['id']; ?>?');">
    <input type="hidden" name ="__spoof_method" value="PUT">

    <div>
      <button type="submit">🎨 Edit</button>
    </div>
  </form>


  <?php // require view(path: 'partials/forms/habit-delete.view.php'); ?>
    <form action="/habit/<?= $habit['id']; ?>" method="POST" onsubmit="return confirm('Are you sure you want to soft-delete habit Nr.<?= $habit['id']; ?>?');">
      <input type="hidden" name ="__spoof_method" value="PATCH">

      <div>
        <button type="submit">🗑️ Soft-delete</button>
      </div>
    </form>

  <hr>

  <?php require view(path: 'components/footer.view.php'); ?>

</body>