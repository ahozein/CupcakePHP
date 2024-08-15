<?php require APP_ROOT . '/views/includes/header.php'; ?>

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">

<?php require APP_ROOT . '/views/includes/navbar.php' ?>

    <main role="main" class="text-center text-white">

        <h2 class="mb-4">CupcakePHP</h2>

        <p>CupcakePHP is a lightweight and simple mini-framework based on the MVC (Model-View-Controller)
            architecture !</p>

        <a href="<?php echo URL_ROOT . 'users/login' ?>" class="btn btn-secondary">login</a>

    </main>

<?php require APP_ROOT . '/views/includes/footer.php'; ?>