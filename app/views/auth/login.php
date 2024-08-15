<?php require APP_ROOT . '/views/includes/header.php'; ?>

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">

<?php require APP_ROOT . '/views/includes/navbar.php' ?>

    <div class="row">
        <div class="col-md-7 mx-auto">
            <div class="card">

                <div class="card-body">
                    <?php flash('register_success'); ?>
                    <form action="<?php echo URL_ROOT; ?>users/login" method="post">

                        <div class="form-group">
                            <label for="email"> Email <sup>*</sup> </label>
                            <input type="email" name="email"
                                   class="form-control <?php echo (!empty($data['email_error'])) ? 'is-invalid' : ''; ?>"
                                   value="<?php echo $data['email']; ?>">
                            <span class="invalid-feedback"> <?php echo $data['email_error'] ?> </span>
                        </div>

                        <div class="form-group">
                            <label for="password"> Password <sup>*</sup> </label>
                            <input type="password" name="password"
                                   class="form-control <?php echo (!empty($data['password_error'])) ? 'is-invalid' : ''; ?>"
                                   value="<?php echo $data['password']; ?>">
                            <span class="invalid-feedback"> <?php echo $data['password_error'] ?> </span>
                        </div>

                        <div class="text-center my-4">
                            <button class="btn btn-dark" type="submit"> Login</button>
                        </div>

                    </form>
                </div>
            </div>
            <div class="text-center mt-2">
                <p class="text-white">
                    Don't have an account?
                    <a href="<?php echo URL_ROOT; ?>users/register" class="text-dark"> Register </a>
                </p>
            </div>
        </div>
    </div>

<?php require APP_ROOT . '/views/includes/footer.php'; ?>