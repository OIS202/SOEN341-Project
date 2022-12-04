<?php

if(!isset($_SESSION)) {
    session_start();
}

$id = $_GET["id"];
$product = [];
if (($handle = fopen("../../backstore/database/myProducts.csv", "r")) !== FALSE) {
    while (($row = fgetcsv($handle)) !== FALSE) {
        if($row[0] == $id){
            $product = $row;
        }
    }
    fclose($handle);
} else {
    $error = "Something wrong occurred. Cannot continue!";
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/favicon/favicon-16x16.png">

    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link href="https://fonts.googleapis.com/css2?family=Londrina+Solid:wght@100;300&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../../client-side/list-product.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/uikit@3.6.15/dist/css/uikit.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!--        <link rel="stylesheet" type="text/css"  href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../../js/product.js"></script>



    <title>
        <?php
        echo $product[1];
        ?>
    </title>

</head>

<body class="background">

<header class="header1">
    <div class="main">
        <div class="logo" style = "position: relative; top:25px;">
            <img src="../../img/logo.png">
        </div>
        <ul style = "position: relative; text-align: center; background-color: rgb(243, 238, 226);">
            <li><a href="#">Home</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Aisles </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="../vegetal.php">Vegetal</a>
                    <a class="dropdown-item" href="../animal.php">Animal</a>
                    <a class="dropdown-item" href="../mining.php">Mining</a>
                </div>
            </li>
            <li><a href="../../SignupPage.html">Sign Up</a></li>
            <li><a href="../../client-side/loginpage.php">Log In</a></li>
            <li><a href="../../Cart-Anass/Cart.php">Cart</a></li>
            <li><a href="../../apprRequests.php">Requests</a></li>
            <li><a href="../../client-side/AboutPage.html">About</a></li>
        </ul>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-md-5 ">
            <br>

            <img class="product-image" src="../../<?php echo $product[4] ?>" alt="<?php $product[1] ?>">

        </div>

        <div class="col-md-7 marg">
            <br>

            <h4 class="pro-d-title product-title" id="title"><?php echo $product[1]?></h4>

            <div class="margin">
                <button type="button" class="btn btn-info moreInfoColor" data-toggle="collapse" data-target="#demo">More info</button>
                <div id="demo" class="collapse">
                    <?php echo $product[6] ?>
                </div>
            </div>

            <?php
            echo "<p class='product-price'>$<span id='product-Price'>$product[2]</span> $product[3]</p>";
            ?>
            <div class="product_meta">
                <span class="posted_in"> <strong>Availability:</strong> <a class="inStock" href="#">In Stock</a></span>
            </div>
            <label>Quantity: </label>
            <label>
                <i class="fas plus-icon fa-plus align-self-center mr-2 plus" name="plus"></i>
                <input type="hidden" value="5.99" name="unitary">
                <input class="text-dark text-bold border-thicc p-2 rounded-3 number-selector" id="quantity" value="1" type="number" disabled>
                <i class="fas minus-icon fa-minus align-self-center ml-2 minus" name="minus"></i>
            </label>
            <button type="button" class="btn btn-outline-success add" >Add to cart</button>
            <p id="change">Total (before taxes) : $ <?php echo $product[2]?></p>
            <p>
        </div>
    </div>
    <p id="id" style="display:none;"><?php echo $product[0]?></p>


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


<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>