<?php include_once __DIR__ . '/../common/header.php'; ?>

<div class="login-box">
    <div class="login-logo"> <a href="/"><b>VENDING MACHINE</b></a> </div> <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <form method="POST" action="/auth/login">
                <?php include_once __DIR__ . '/../common/error.php'; ?>
                <div class="input-group mb-3"> <input type="text" class="form-control" name="username"
                        placeholder="username">
                    <div class="input-group-text"> <span class="bi bi-emoji-smile"></span> </div>
                </div>
                <div class="input-group mb-3"> <input type="password" class="form-control" name="password"
                        placeholder="Password">
                    <div class="input-group-text"> <span class="bi bi-lock-fill"></span> </div>
                </div>
                <!--begin::Row-->
                <div class="row">
                    <div class="col-8">
                        <div class="form-check"> <input class="form-check-input" type="checkbox" value=""
                                id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault">
                                Remember Me
                            </label> </div>
                    </div> <!-- /.col -->
                    <div class="col-4">
                        <div class="d-grid gap-2"> <button type="submit" class="btn btn-primary">Sign In</button>
                        </div>
                    </div> <!-- /.col -->
                </div>
                <!--end::Row-->
            </form>

            <p class="mb-1"> <a href="forgot-password.html">I forgot my password</a> </p>
            <p class="mb-0"> <a href="./register" class="text-center">
                    Register a new membership
                </a> </p>
        </div> <!-- /.login-card-body -->

    </div>
</div> <!-- /.login-box -->


<?php include_once __DIR__ . '/../common/footer.php'; ?>