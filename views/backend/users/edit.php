<?php include_once __DIR__ . '/../common/header.php'; ?>
<!--begin::App Main-->
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Users</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Users
                        </li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="card card-primary card-outline mb-4">
                    <!--begin::Header-->
                    <div class="card-header">
                        <div class="card-title">Edit User</div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Form-->
                    <form action="/users/update?id=<?php echo $user['id']; ?>" method="post">
                        <!--begin::Body-->
                        <div class="card-body">



                            <?php include_once __DIR__ . '/../../common/error.php'; ?>

                            <div class="mb-3">
                                <label for="productName" class="form-label">Name:</label>
                                <input type="text" id="productName"
                                    value="<?php echo htmlspecialchars($user['username']); ?>" name="username"
                                    class="form-control" required>
                            </div>


                            <div class="mb-3">
                                <label for="roleName" class="form-label">Role:</label>
                                <input type="text" id="roleName" value="<?php echo htmlspecialchars($user['role']); ?>"
                                    name="role" class="form-control">
                            </div>


                        </div>
                        <!--end::Body-->
                        <!--begin::Footer-->
                        <div class="card-footer"> <button type="submit" class="btn btn-primary">Update</button> </div>
                        <!--end::Footer-->
                    </form>
                    <!--end::Form-->
                </div>
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row">
                <!-- Start col -->

                <!-- Start col -->

            </div> <!-- /.row (main row) -->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>
<!--end::App Main-->
<?php include_once __DIR__ . '/../common/footer.php'; ?>