<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Vending Machine</title>

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
                <li><a class="dropdown-item" href="?sort=quantity_available&order=asc">Quantity Ascending</a></li>
                <li><a class="dropdown-item" href="?sort=quantity_available&order=desc">Quantity Descending</a></li>
            </ul>
        </div>

        <!-- Page Features -->
        <div class="row text-center mt-5">

            <?php foreach ($products as $product): ?>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card">
                    <img class="card-img-top" src="pepsi.jpg" alt="">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo htmlspecialchars($product['name']); ?></h4>
                        <p class="card-text">Price - $ <?php echo htmlspecialchars($product['price']); ?></p>
                        <p class="card-text">Quantity - <?php echo htmlspecialchars($product['quantity_available']); ?>
                        </p>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-primary"
                            href="/products/purchase/<?php echo $product['id']; ?>/<?php echo urlencode(strtolower(str_replace(' ', '-', $product['name']))); ?>">Purchase</a>
                    </div>
                </div>
            </div>

            <?php endforeach; ?>



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