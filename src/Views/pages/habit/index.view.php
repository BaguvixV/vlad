<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?= $heading ?></title>
  <!-- <script script="style.css"></script> -->
</head>
<body>

  <?php require view(path: 'components/header.view.php'); ?>

  <?php require view(path: 'components/navigation.view.php'); ?>

  <?php // require view(path: 'partials/forms/habit-create.view.php'); ?>
  <h2>Habit Form</h2>


  <form action="/habit" method="POST">

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
      <button type="submit">Submit</button>
    </div>
  </form>

  <hr>


  <?php require view(path: 'components/footer.view.php'); ?>

</body>