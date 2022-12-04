<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CFP Materials Procurement</title>
    <link rel="stylesheet" type="text/css" href="edit-product.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>
    <header>
        <div class="main">
            <div class="logo" style = "position: relative; top:25px;">
                <img src=".\logo.png">
            </div>
            <ul style = "position: relative; text-align: center;">
                <li><a href="Admin Soen341/index.html">Home</a></li>
                <li><a href="edit-product.html">Edit Product</a></li>
                <li><a href="backstore/list-product.html">List Product</a></li>
                <li><a href="admin-side/ListUsers.html">List User</a></li>
                <li><a href="list-requests.html">List Requests</a></li>
            </ul>
        </div>
    </header>

    <form action="handle-edit-product.php" method = "post">
        <input type="hidden" name="id" value=<?php echo $_GET['id'];?> />
        <label>Please enter a new product name:</label>
        <input type = "text" name="newname" value = ''/><br><br>
        <label>Please enter a new product price:</label>
        <input type = "text" name="newprice" value = ''/><br><br>
        <label>Please enter a new product description:</label>
        <input type = "text" name="newdesc" value = ''/><br><br>
        <label>Please enter a new product section:</label>
        <input type = "text" name="newsect" value = ''/><br><br>
        <input type = "submit" name = "confirm" value = 'Confirm'/>
    </form>

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
</body>
</html>