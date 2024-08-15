<?php
?>
<nav class="masthead mb-auto">
    <div>
        <a href="<?php echo URL_ROOT; ?>pages/index">
            <h4 class="masthead-brand text-center text-white">
                <?php echo SITE_NAME; ?>
            </h4>
        </a>
        <nav class="nav nav-masthead justify-content-center">
            <?php if (isLoggedIn()) : ?>
                <a class="nav-link text-white">Hi <?php echo $_SESSION['user_name'] ?> </a>
                <a class="nav-link ml-4" href="<?php echo URL_ROOT; ?>/users/logout"> Logout </a>
            <?php else : ?>
                <a class="nav-link <?= (str_contains($_SERVER['REQUEST_URI'], 'users/register')) ? 'active' : ''; ?>"
                   href="<?php echo URL_ROOT . 'users/register' ?>"> Register </a>
                <a class="nav-link <?= (str_contains($_SERVER['REQUEST_URI'], 'users/login')) ? 'active' : ''; ?>"
                   href="<?php echo URL_ROOT . 'users/login' ?>"> Login </a>
            <?php endif ?>
        </nav>
    </div>
</nav>