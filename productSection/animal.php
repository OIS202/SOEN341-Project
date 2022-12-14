<?php
if(!isset($_SESSION)) {
    session_start();
}

$products = [];
if (($handle = fopen("../backstore/database/myProducts.csv", "r")) !== FALSE) {
    while (($row = fgetcsv($handle)) !== FALSE) {
        if($row[5] == "Animal")
            array_push($products, $row);
    }
    fclose($handle);
} else {
    $error = "Something wrong occurred. Cannot continue!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>


    <link rel="stylesheet" type="text/css" href="../client-side/list-product.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">



    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link rel="icon" type="image/png" href="test"/> <!-- Browser Icon -->

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/uikit@3.6.15/dist/css/uikit.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta charset="UTF-8">
    <title>Animal</title>

</head>
<body>

<header class="header1">
    <div class="main">
        <div class="logo" style = "position: relative; top:25px;">
            <img src="../img/logo.png">
        </div>
        <ul style = "position: relative; text-align: center; background-color: rgb(243, 238, 226);">
            <li><a href="#">Home</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Aisles </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="vegetal.php">Vegetal</a>
                    <a class="dropdown-item" href="animal.php">Animal</a>
                    <a class="dropdown-item" href="mining.php">Mining</a>
                </div>
            </li>
            <li><a href="#">Sign Up</a></li>
            <li><a href="#">Log In</a></li>
            <li><a href="#">Cart</a></li>
            <li><a href="#">Requests</a></li>
            <li><a href="#">About</a></li>
        </ul>
    </div>
</header>


<div class="jumbotron jumbotron-fluid animal">
    <div class="container whiteBorder">
        <h1 class="display-4 centerWhite">Animal</h1>
    </div>
</div>

<div class="all">

    <!-- filter section-->

    <div class="filter text">
        <p>
            <b><span class="font-word">Filter</span></b>
        </p>

        <p class="filterCategory">
            <a class="filter-option" href="vegetal.php">Vegetal</a>
        </p>
        <p class="filterCategory">
            <a class="filter-option" href="animal.php">Animal</a>
        </p>
        <p class="filterCategory">
            <a class="filter-option" href="mining.php">Mining</a>
        </p>
    </div>


    <!-- Product display -->

    <div class="container mt-5 mb-5">
        <div class="row">

            <?php
            foreach($products as $product):
                ?>

                <div class="col col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                    <div class="product card-aisle rounded uk-card-default card product">
                        <a class="productLink" href="product/product.php?id=<?php echo $product[0] ?>">
                            <img class="productImage" alt="<?php echo $product[1] ?>" src="../<?php echo $product[4] ?>">
                        </a>
                        <div class="card-body productDetails" align="center">
                            <p class="productName"><?php echo $product[1] ?></p>
                            <?php
                                echo "<p class='productPrice'> \$$product[2] $product[3] </p>";
                            ?>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>
    </div>
</div>
</div>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col">
                <h4>company</h4>
                <ul>
                    <li><a href="#">about us</a></li>
                    <li><a href="#">our services</a></li>
                    <li><a href="#">privacy policy</a></li>
                    <li><a href="#">affiliate program</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>get help</h4>
                <ul>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">shipping</a></li>
                    <li><a href="#">returns</a></li>
                    <li><a href="#">order status</a></li>
                    <li><a href="#">payment options</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>follow us</h4>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>>