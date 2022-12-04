<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requests</title>
    <script src="./detailedDescription.js"></script>
    <link rel="stylesheet" type="text/css" href="requests.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <div class="main">
            <div class="logo">
                <img src="img/logo.png">
            </div>
            <ul>
                <li><a href="client-side/homepage.html">Home</a></li>
                <li><a href="productSection/animal.php">Products</a></li>
                <li><a href="SignupPage.html">Sign Up</a></li>
                <li><a href="client-side/loginpage.php">Log In</a></li>
                <li><a href="Cart-Anass/Cart-Anass/Cart.php">Cart</a></li>
                <li><a href="apprRequests.php">Requests</a></li>
                <li><a href="client-side/AboutPage.html">About</a></li>
            </ul>
        </div>
    </header>
    <main>
        <?php
            $requestInfo = json_decode(file_get_contents("./requests.json"),true);
            $j = 0;
            $userCounter = 0;
            while(isset($requestInfo[strval($j)])){
                if(strcmp($requestInfo[strval($j)]["username"],"omar") == 0){
                    echo "<div class=\"gallery\">";
                    echo "<div class=\"content\">";
                    echo "<div class=\"text\">";
                    echo "<h3 class=\"request\"> Request ".($userCounter+1)."</h3>";
                    echo "<h4 class=\"status\">".$requestInfo[strval($j)]["status"]."</h4>";
                    echo "<p>".$requestInfo[strval($j)]["details"]."</p>";
                    if(strcmp($requestInfo[strval($j)]["status"],"approved") == 0){
                        echo "<i class=\"fa-solid fa-angles-down\" id=\"".($j+1)."\" onclick=\"showIt(this.id)\"></i>";
                    }
                    echo "<div class=\"detDes\" id=\"button".($j+1)."\">";
                    echo "<p>";
                    echo $requestInfo[strval($j)]["details"];
                    echo "<br>";
                    echo "Total: ".$requestInfo[strval($j)]["total"];
                    echo "</p>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    $userCounter++;
                }
                $j++;
            }
        ?>
    </main>
    <script>
        showDelete();
    </script>
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
