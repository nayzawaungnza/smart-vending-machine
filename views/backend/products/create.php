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
                    <h3 class="mb-0">Products</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Products
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
                        <div class="card-title">Create Product</div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Form-->
                    <form action="/products/create" method="post">
                        <!--begin::Body-->
                        <div class="card-body">



                            <?php include_once __DIR__ . '/../../common/error.php'; ?>

                            <div class="mb-3">
                                <label for="productName" class="form-label">Name:</label>
                                <input type="text" id="productName" name="name" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="productPrice" class="form-label">Price:</label>
                                <input type="number" id="productPrice" min="0.01" step="0.01" name="price"
                                    class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="productQuantity" class="form-label">Quantity Available:</label>
                                <input type="number" id="productQuantity" min="1" name="quantity" class="form-control"
                                    required>
                            </div>


                        </div>
                        <!--end::Body-->
                        <!--begin::Footer-->
                        <div class="card-footer"> <button type="submit" class="btn btn-primary">Submit</button> </div>
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