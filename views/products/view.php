<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> </title>

    <!-- Bootstrap core CSS -->
    <link href="/public/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/public/css/heroic-features.css" rel="stylesheet">

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Welcome!</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <?php if (isset($this->session['user_id'])): ?>
                        <form action="/auth/logout" method="post" style="display: inline;">
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                        <?php else: ?>
                        <a href="/auth/login" class="btn btn-primary">Login</a>
                        <?php endif; ?>
                    </li>
                    <!--<li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>-->

                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron my-4">
            <h1 class="display-3">Smart Vending Machine!!</h1>
            <p class="lead">A Warm Welcome!</p>
            <!--<a href="#" class="btn btn-primary btn-lg">Call to action!</a>-->
        </header>


        <!-- Page Features -->
        <div class="row text-center mt-5 mb-5">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center mb-4"> <?= $product['name']; ?></h2>
                </div>
                <div class="card-body">

                    <p><strong>Price per unit:</strong> $<?= number_format($product['price'], 2); ?></p>
                    <p><strong>Quantity Available:</strong> <?= htmlspecialchars($product['quantity_available']); ?>
                    </p>






                    <?php include_once __DIR__ . '/../common/error.php'; ?>

                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <a href="/products" class="btn btn-secondary">Back to Product List</a>

                    </div>
                </div>
            </div>



        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Developer Nay @ 2024</p>
        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="/public/js/jquery.min.js"></script>
    <script src="/public/assets/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

</html>