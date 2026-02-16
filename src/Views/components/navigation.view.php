<hr>
<nav>
    <ul>
        <li>
            <a href="/">Home</a>
        </li>
        <?php if (!$loggedInUserEmail) : ?>
            <li>
                <a href="/login">Login</a>
            </li>
            <li>
                <a href="/register">Register</a>
            </li>
        <?php else : ?>
            <li>
                <a href="/dashboard" style="color:chocolate"><strong>Dashboard</strong></a>
            </li>
            <li>
                <a href="/habit" style="color:teal"><strong>Create habit</strong></a>
            </li>
            <li>
                <a href="/archived" style="color:olive"><strong>Archived habits</strong></a>
            </li>
        <?php endif; ?>
        <li>
            <a href="/about">About</a>
        </li>
        <?php if ($loggedInUserEmail) : ?>
            <li>
                <a href="/logout" style="color:crimson"><strong>Logout</strong></a>
            </li>
        <?php endif; ?>
        <br>
        <li>
            <a href="/4dm1n">Admin</a>
        </li>
    </ul>
</nav>
<hr>