<hr>
<nav>
  <ul>
    <li>
      <a href="/">Home</a>
    </li>
    <?php if (! $loggedInUserEmail) : ?>
    <li>
      <a href="/login">Login</a>
    </li>
    <li>
      <a href="/register">Register</a>
    </li>
    <?php else : ?>
    <li>
      <a href="/dashboard" style="color:green"><strong>Profile</strong></a>
    </li>
    <li>
      <a href="/create-habit" style="color:green"><strong>Create habit</strong></a>
    </li>
    <?php endif; ?>
    <li>
      <a href="/about">About</a>
    </li>
    <?php if ($loggedInUserEmail) : ?>
    <li>
      <a href="/izlogoties" style="color:crimson"><strong>Logout</strong></a>
    </li>
    <?php endif; ?>
    <br>
    <li>
      <a href="/4dm1n">Admin</a>
    </li>
  </ul>
</nav>
<hr>