<?php
require_once '../views/templates/header.php';?>

<section class="vh-100">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black " style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                                <!-- Form Start-->
                                <form class="mx-1 mx-md-4" method="post" action="/register">

                                    <!-- User Name -->
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="username">Your Name</label>
                                            <input type="text" class="form-control <?= isset($errors['username']) ? 'is-invalid' : '' ?>" id="username" name="username" value="<?= htmlspecialchars($inputs['username'] ?? '') ?>">
                                            <?php if (isset($errors['username'])): ?>
                                                <div class="invalid-feedback"><?= $errors['username'] ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <!-- User Name -->

                                    <!-- User Email -->
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="email">Your Email</label>
                                            <input type="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" id="email" name="email" value="<?= htmlspecialchars($inputs['email'] ?? '') ?>">
                                <?php if (isset($errors['email'])): ?>
                                    <div class="invalid-feedback"><?= $errors['email'] ?></div>
                                <?php endif; ?>
                                        </div>
                                    </div>
                                    <!-- User Email -->

                                    <!-- User Password -->
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="password">Password</label>
                                            <input type="password" 
                                       class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>" 
                                       id="password" 
                                       name="password">
                                <?php if (isset($errors['password'])): ?>
                                    <div class="invalid-feedback"><?= $errors['password'] ?></div>
                                <?php endif; ?>
                                        </div>
                                    </div>
                                    <!-- User Password -->

                                    <!--Register Button-->
                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                            class="btn btn-primary btn-lg" name="submit">Register</button>
                                    </div>
                                    <!--Register Button-->

                                    <!-- Login link -->
                                    <p class="text-center text-muted mt-5 mb-0">Have already an account?
                                        <a href="/login" class="fw-bold text-body"><u>Login here</u></a>
                                    </p>
                                    <!-- Login link -->

                                </form>
                                <!-- Form END-->

                            </div>
                            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                                    class="img-fluid" alt="Sample image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once '../views/templates/footer.php';?>