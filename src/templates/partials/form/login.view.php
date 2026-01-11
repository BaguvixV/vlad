<h2>Login Form</h2>


<form action="/pieslegties" method="post">

  <?php if (isset($generalError)) : ?>
    <p style="color:red;font-weight:bold;font-style: italic;"><?= $generalError; ?></p>
  <?php endif; ?>

  <?php if (isset($error['email'])) : ?>
    <p style="color:red;font-weight:bold;font-style: italic;"><?= $error['email']; ?></p>
  <?php endif; ?>
  <div>
    <label for="email">Email</label>  
    <input type="text" name="email">
  </div>

  <?php if (isset($error['password'])) : ?>
    <p style="color:red;font-weight:bold;font-style: italic;"><?= $error['password']; ?></p>  
  <?php endif; ?>
  <div>
    <label for="password">Password</label>  
    <input type="password" name="password">
  </div>

  <div>
    <button type="submit">Submit</button>
  </div>
</form>