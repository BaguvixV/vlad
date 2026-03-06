<hr>
<nav>
    <ul>
        <?php if (!$loggedInUserEmail) : ?>
            <li>
                <a href="/">Home</a>
            </li>
            <li>
                <a href="/about">About</a>
            </li>
            <li>
                <a href="/login">Login</a>
            </li>
            <li>
                <a href="/register">Register</a>
            </li>
            <li>
                <a href="/admin" style="color:saddlebrown">Admin</a>
            </li>
        <?php elseif ($_SESSION['user']['role'] === 'admin') : ?>
            <li>
                <a href="/admin/dashboard"><strong>Admin's extras</strong></a>
            </li>
            <li>
                <a href="/dashboard"><strong>Dashboard</strong></a>
            </li>
            <li>
                <a href="/habit"><strong>Create habit</strong></a>
            </li>
            <li>
                <a href="/archived"><strong>Archived habits</strong></a>
            </li>
            <li>
                <a href="/logout"><strong>Logout</strong></a>
            </li>
        <?php else : ?>
            <li>
                <a href="/dashboard"><strong>Dashboard</strong></a>
            </li>
            <li>
                <a href="/habit"><strong>Create habit</strong></a>
            </li>
            <li>
                <a href="/archived"><strong>Archived habits</strong></a>
            </li>
            <li>
                <a href="/logout"><strong>Logout</strong></a>
            </li>
        <?php endif; ?>
    </ul>
</nav>
<hr>