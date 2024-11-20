<?php include_once __DIR__ . '/../common/header.php'; ?>

<div class="register-box">
    <div class="register-logo"> <a href="/"><b>VENDING MACHINE</b></a> </div> <!-- /.register-logo -->
    <div class="card">
        <div class="card-body register-card-body">
            <p class="register-box-msg">Register a new membership</p>
            <form method="POST" action="/auth/login">
                <?php include_once __DIR__ . '/../common/error.php'; ?>
                <div class="input-group mb-3"> <input type="text" name="username" class="form-control"
                        placeholder="Username">
                    <div class="input-group-text"> <span class="bi bi-person"></span> </div>
                </div>

                <div class="input-group mb-3"> <input type="password" name="password" class="form-control"
                        placeholder="Password">
                    <div class="input-group-text"> <span class="bi bi-lock-fill"></span> </div>
                </div>
                <!--begin::Row-->
                <div class="row">
                    <div class="col-8">
                        <div class="form-check"> <input class="form-check-input" type="checkbox" value=""
                                id="flexCheckDefault"> <label class="form-check-label" for="flexCheckDefault">
                                I agree to the <a href="#">terms</a> </label> </div>
                    </div> <!-- /.col -->
                    <div class="col-4">
                        <div class="d-grid gap-2"> <button type="submit" class="btn btn-primary">Sign In</button> </div>
                    </div> <!-- /.col -->
                </div>
                <!--end::Row-->
            </form>

            <p class="mb-0"> <a href="/auth/login" class="text-center">
                    I already have a membership
                </a> </p>
        </div> <!-- /.register-card-body -->
    </div>
</div>




<?php include_once __DIR__ . '/../common/footer.php'; ?>