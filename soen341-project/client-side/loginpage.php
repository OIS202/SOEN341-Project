<?php require("loginpageclass.php") ?>
<?php 
if(isset($_POST['submit'])){
 $user = new LoginUser($_POST['firstname'], $_POST['Password']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place your page title here</title>
    <link rel="stylesheet" type="text/css" href="loginstyle.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
   <!-- <script defer src = "loginpage.js"></script> -->
</head>
<body>
    <header>
        <div class="main">
            <div class="logo">
                <img src="/img/logo.png">
            </div>
            <ul>
                <li><a href="homepage.html">Home</a></li>
                <li><a href="../productSection/animal.php">Products</a></li>
                <li><a href="../SignupPage.html">Sign Up</a></li>
                <li><a href="loginpage.php">Log In</a></li>
                <li><a href="../Cart-Anass/Cart.php">Cart</a></li>
                <li><a href="../apprRequests.php">Requests</a></li>
                <li><a href="AboutPage.html">About</a></li>
            </ul>
        </div>
    </header>
    <main>
        <h1>Login</h1><br>
        <div id="login-error-msg-holder">
            <p id="loginErrorMsg">Invalid username <span id="error-msg-second-line">and/or password</span></p>
        </div>
        <div class="login">
         <form id = "loginForm" action="" method="post" enctype="multipart/form-data" autocomplete="off" >
            <label> Username </label> <br>
            <input type="text" placeholder="Username" name="firstname" id="Username"><br>
            <label> Password </label><br>
            <input type="password" placeholder="Password" name="Password" id="Password"><br>
            <input type="checkbox"> Remember me<br>
            <label type="text" name="forgotPassword" id="forgotPassword"><a href="#">Forgot Password?</a><br>
            <button type="submit" name="submit"id = "loginSubmit">Log in</button><br>

            <p class="error"><?php echo @$user->error ?></p>
		    <p class="success"><?php echo @$user->success ?></p>

         </form>
        </div>
    </main>
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
                <div class="footer-col">+
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