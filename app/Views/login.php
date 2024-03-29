<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<section>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <h3 class="text-center" style="margin-top: 5rem; margin-bottom: 5rem;">Login </h3>
            <div class="animate__animated animate__backInLeft col-md-9 col-lg-6 col-xl-5">
                <img src="/images/trip.jpg" class="img-fluid rounded" alt="Sample image">
            </div>
            <div class="animate__animated animate__backInRight col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form action="login" method="post">
                    <div class="form-outline mb-4">
                        <input type="email" id="email" name="email" class="form-control form-control-lg"
                            placeholder="Enter a valid email address" />
                        <label class="form-label" for="login-email">Email address</label>
                    </div>
                    <div class="form-outline mb-3">
                        <input type="password" id="password" name="password"
                            class="form-control form-control-lg" placeholder="Enter password" />
                        <label class="form-label" for="login-password">Password</label>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="form-check mb-0">
                            <input class="form-check-input me-2" type="checkbox" value="" id="remember-me"
                                name="remember-me" />
                            <label class="form-check-label" for="remember-me">
                                Remember me
                            </label>
                        </div>
                        <a href="#!" class="text-body">Forgot password?</a>
                    </div>
                    <div class="text-center text-lg-start mt-4 pt-2">
                        <input type="submit" class="btn btn-primary btn-lg"
                            style="padding-left: 2.5rem; padding-right: 2.5rem;" value="Log in">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account?
                            <a href="register" class="link-info">Register</a>
                        </p>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>
<?= $this->endSection()?>