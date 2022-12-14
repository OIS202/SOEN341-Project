<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requests</title>
    <script src="./detailedDescription.js"></script>
    <link rel="stylesheet" type="text/css" href="requests.css">
    <link rel="stylesheet" href="./list-requests.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <div class="main">
            <div class="logo">
                <img src="img/logo.png">
            </div>
            <ul>
                <li><a href="Admin Soen341/index.html">Home</a></li>
                <li><a href="edit-product.html">Edit Product</a></li>
                <li><a href="backstore/list-product.html">List Product</a></li>
                <li><a href="admin-side/EditUser.html">Edit User</a></li>
                <li><a href="admin-side/ListUsers.html">List User</a></li>
                <li><a href="list-requests.html">List Requests</a></li>
            </ul>
        </div>
    </header>
    <main>
        <table class="content-table">
            <thead>
                <th>Username</th>
                <th>Request Detail</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php
                    $requestInfo = json_decode(file_get_contents("./requests.json"),true);
                    $j = 0;
                    while(isset($requestInfo[strval($j)])){
                        if(strcmp($requestInfo[strval($j)]["status"],"pending") == 0){
                            echo "<tr>";
                            echo "<td>".$requestInfo[strval($j)]["username"]."</td>";
                            echo "<td>Details: ".$requestInfo[strval($j)]["details"]."| Total: ".$requestInfo[strval($j)]["total"]."</td>";
                            echo "<td> <button class=\"approve\"> <a href=\"./handleRequests.php?action=approve&id=".$j."\">Approve</a> </button> <button class=\"decline\"><a href=\"./handleRequests.php?action=decline&id=".$j."\">Decline</a></button> </td>";
                            echo "</tr>";
                        }
                        $j++;
                    }
                ?>
            </tbody>
        </table>
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
