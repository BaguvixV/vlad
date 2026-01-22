<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?= $heading ?></title>
  <!-- <script script="style.css"></script> -->
</head>
<body>

  <?php require view(path: 'components/header.view.php'); ?>

  <?php require view(path: 'components/navigation.view.php'); ?>

  <?php if (! isset($habits)) : ?>
    <h3 style="color:crimson">There are no archived habits</h3>
  <?php else : ?>
    <?php // require view(path: 'partials/forms/habit-show.view.php'); ?>
    <?php foreach ($habits as $habit) : ?>
      <h3>Habit: <i>"<?=  htmlspecialchars($habit['title']); ?>"</i></h3>
      <p><strong>ID:</strong> <?= htmlspecialchars($habit['habit_id']); ?></p>
      <p><strong>Created At:</strong> <?= htmlspecialchars($habit['created_at']); ?></p>
      <p><strong>Completion:</strong> <?= htmlspecialchars($habit['completion']); ?></p>
      <p><strong>Title:</strong> <?= htmlspecialchars($habit['title']); ?></p>
      <p><strong>Description:</strong> <?= htmlspecialchars($habit['description']); ?></p>
      <p><strong>Is Active:</strong> <?= htmlspecialchars($habit['is_active']); ?></p>
      
  
      <form action="/archived/<?= $habit['habit_id']; ?>" method="POST" onsubmit="return confirm('Are you sure you want to restore soft-deleted habit Nr.<?= $habit['habit_id']; ?>?');">
        <input type="hidden" name ="__spoof_method" value="PATCH">
  
        <div>
          <button type="submit">🔄 Restore</button>
        </div>
      </form>
  
  
      <?php // require view(path: 'partials/forms/habit-delete.view.php'); ?>
      <form action="/archived/<?= $habit['habit_id']; ?>" method="POST" onsubmit="return confirm('Are you sure you want to force-delete habit Nr.<?= $habit['habit_id']; ?>?');">
        <input type="hidden" name ="__spoof_method" value="DELETE">
  
        <div>
          <button type="submit">🗑️ Completly delete</button>
        </div>
      </form>
  
      <hr>
    <?php endforeach; ?>
  <?php endif; ?>

  <?php require view(path: 'components/footer.view.php'); ?>

</body>