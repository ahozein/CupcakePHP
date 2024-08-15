<?php require APP_ROOT . '/views/includes/header.php'; ?>

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">

<?php require APP_ROOT . '/views/includes/navbar.php' ?>

    <div class="row">
        <div class="col-md-7 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo URL_ROOT; ?>users/register"
                          method="post">

                        <div class="form-group">
                            <label for="name"> Name <sup>*</sup> </label>
                            <input type="text" id="name" name="name"
                                   class="form-control <?php echo (!empty($data['name_error'])) ? 'is-invalid' : ''; ?>"
                                   value="<?php echo $data['name']; ?>"/>
                            <div class="invalid-feedback"> <?php echo $data['name_error'] ?> </div>
                        </div>

                        <div class="form-group">
                            <label for="email"> Email <sup>*</sup> </label>
                            <input id="email" type="email" name="email"
                                   class="form-control <?php echo (!empty($data['email_error'])) ? 'is-invalid' : ''; ?>"
                                   value="<?php echo $data['email']; ?>">
                            <span class="invalid-feedback"> <?php echo $data['email_error'] ?> </span>
                        </div>

                        <div class="form-group">
                            <label for="password"> Password <sup>*</sup> </label>
                            <input id="password" type="password" name="password"
                                   class="form-control <?php echo (!empty($data['password_error'])) ? 'is-invalid' : ''; ?>"
                                   value="<?php echo $data['password']; ?>">
                            <span class="invalid-feedback"> <?php echo $data['password_error'] ?> </span>
                        </div>

                        <div class="form-group">
                            <label for="confirm_password"> Confirm Password <sup>*</sup> </label>
                            <input id="confirm_password" type="password" name="confirm_password"
                                   class="form-control <?php echo (!empty($data['confirm_password_error'])) ? 'is-invalid' : ''; ?>"
                                   value="<?php echo $data['confirm_password']; ?>">
                            <span class="invalid-feedback"> <?php echo $data['confirm_password_error'] ?> </span>
                        </div>

                        <div class="text-center my-4">
                            <button class="btn btn-dark" type="submit">Register</button>
                        </div>

                    </form>
                </div>
            </div>
            <div class="text-center mt-2">
                <p class="text-white">
                    Already have an account?
                    <a href="<?php echo URL_ROOT; ?>users/login" class="text-dark"> Login </a>
                </p>
            </div>
        </div>
    </div>

<?php require APP_ROOT . '/views/includes/footer.php'; ?>