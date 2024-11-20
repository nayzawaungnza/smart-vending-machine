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
                    <h3 class="mb-0">Dashboard</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Dashboard
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
                <div class="card">

                    <div class="card-header">

                        <div class="dropdown me-2">
                            <button class="btn btn-outline-primary dropdown-toggle" type="button" id="sortDropdown"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Select Sorting Option
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                                <li><a class="dropdown-item" href="?sort=name&order=asc">Name Ascending</a></li>
                                <li><a class="dropdown-item" href="?sort=name&order=desc">Name Descending</a></li>
                                <li><a class="dropdown-item" href="?sort=price&order=asc">Price Ascending</a></li>
                                <li><a class="dropdown-item" href="?sort=price&order=desc">Price Descending</a></li>
                                <li><a class="dropdown-item" href="?sort=quantity_available&order=asc">Quantity
                                        Ascending</a></li>
                                <li><a class="dropdown-item" href="?sort=quantity_available&order=desc">Quantity
                                        Descending</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>username</th>
                                    <th class="text-end">role</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($users as $user): ?>
                                <tr class="align-middle">
                                    <td class="text-end"><?php echo htmlspecialchars($user['id']); ?>.</td>
                                    <td><?php echo htmlspecialchars($user['username']); ?></td>

                                    <td class="text-end"><span
                                            class="badge text-bg-primary"><?php echo htmlspecialchars($user['role']); ?></span>
                                    </td>
                                    <td class="text-center">
                                        <!-- View Product -->
                                        <a href="/auth/users/view?id=<?php echo $user['id']; ?>"
                                            class="btn btn-outline-success btn-sm mx-1" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="View Product">
                                            <i class="bi bi-eye"></i>
                                        </a>

                                        <!-- Edit Product -->
                                        <a href="/auth/users/edit?id=<?php echo $user['id']; ?>"
                                            class="btn btn-outline-primary btn-sm mx-1" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Edit Product">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>



                                        <!-- Delete Product -->
                                        <a href="/users/delete?id=<?php echo $user['id']; ?>"
                                            class="btn btn-outline-danger btn-sm mx-1" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Delete User"
                                            onclick="return confirm('Are you sure you want to delete this user?');">
                                            <i class="bi bi-trash-fill"></i>
                                        </a>
                                    </td>

                                </tr>
                                <?php endforeach; ?>



                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer clearfix">


                        <ul class="pagination pagination-md m-5 justify-content-center">
                            <?php if ($page > 1): ?>
                            <li class="page-item"><a class="page-link"
                                    href="/auth/users?page=<?php echo $page - 1; ?>">Previous</a></li>
                            <?php endif; ?>

                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <?php if ($i == $page): ?>
                            <li class="page-item active"><span class="page-link"><?php echo $i; ?></span></li>
                            <?php else: ?>
                            <li class="page-item"><a class="page-link"
                                    href="/auth/users?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                            <?php endif; ?>
                            <?php endfor; ?>

                            <?php if ($page < $totalPages): ?>
                            <li class="page-item"><a class="page-link"
                                    href="/auth/users?page=<?php echo $page + 1; ?>">Next</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
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