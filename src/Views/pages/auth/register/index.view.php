<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= $heading ?></title>
    <!-- <script script="style.css"></script> -->
</head>
<body>

<?php require view(path: 'components/header.view.php'); ?>

<?php require view(path: 'components/navigation.view.php'); ?>

<?php // require view(path: 'partials/forms/register.view.php'); ?>
<h2>Register Form</h2>

<form action="/register" method="post">
    <div>

        <?php if (isset($generalError)) : ?>
            <h3 style="color:red;font-style: italic;"><?= htmlspecialchars($generalError); ?></h3>
        <?php endif; ?>

        <?php if (isset($error['name'])) : ?>
            <strong style="color:red;"><?= $error['name']; ?></strong>
            <br>
        <?php endif; ?>

        <label for="name">Name</label>
        <input type="text" name="name" placeholder="John" value="<?= $old['name'] ?? ''; ?>">
    </div>

    <div>
        <?php if (isset($error['surname'])) : ?>
            <strong style="color:red;"><?= $error['surname']; ?></strong>
            <br>
        <?php endif; ?>

        <label for="surname">Surname</label>
        <input type="text" name="surname" placeholder="Silverhand" value="<?= $old['surname'] ?? ''; ?>">
    </div>

    <div>
        <?php if (isset($error['age'])) : ?>
            <strong style="color:red;"><?= $error['age']; ?></strong>
            <br>
        <?php endif; ?>

        <label for="age">Age</label>
        <input type="text" name="age" placeholder="2077" value="<?= $old['age'] ?? ''; ?>">
    </div>

    <div>
        <?php if (isset($error['email'])) : ?>
            <strong style="color:red;"><?= $error['email']; ?></strong>
            <br>
        <?php endif; ?>

        <label for="email">Email</label>
        <input type="text" name="email" placeholder="js@gmail.com" value="<?= $old['email'] ?? ''; ?>">
    </div>

    <div>
        <?php if (isset($error['password'])) : ?>
            <strong style="color:red;"><?= $error['password']; ?></strong>
            <br>
        <?php endif; ?>

        <label for="password">Password</label>
        <input type="password" name="password" placeholder="P4SSWORD123">
    </div>

    <div>
        <?php if (isset($error['rePassword'])) : ?>
            <strong style="color:red;"><?= $error['rePassword']; ?></strong>
            <br>
        <?php endif; ?>

        <label for="rePassword">Repeat Password</label>
        <input type="password" name="rePassword" placeholder="P4SSWORD123">
    </div>

    <div>
        <?php if (isset($error['phone'])) : ?>
            <strong style="color:red;"><?= $error['phone']; ?></strong>
            <br>
        <?php endif; ?>

        <label for="phone">Phone</label>
        <input type="text" name="phone" placeholder="+371 21234567" value="<?= $old['phone'] ?? ''; ?>">
    </div>

    <div>
        <button type="submit">Submit</button>
    </div>
</form>

<hr>


<?php require view(path: 'components/footer.view.php'); ?>

</body>