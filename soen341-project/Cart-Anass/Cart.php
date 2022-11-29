<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" type="text/css" href="Cart.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>
    <header>
        <div class="main">
            <div class="logo">
                <img src="images/logo.png">
            </div>
            <ul>
                <li><a href="../client-side/homepage.html">Home</a></li>
                <li><a href="../productSection/animal.php">Products</a></li>
                <li><a href="../SignupPage.html">Sign Up</a></li>
                <li><a href="../client-side/loginpage.php">Log In</a></li>
                <li><a href="Cart.php">Cart</a></li>
                <li><a href="../apprRequests.php">Requests</a></li>
                <li><a href="../client-side/AboutPage.html">About</a></li>
            </ul>
        </div>
    </header>
    <main>

        <?php
        if(isset($_POST['update'])){
           $id= $_POST['id'];
           $quantity=$_POST['quantity'];
            $records = json_decode(file_get_contents("cart.json"));
            foreach ($records as $i => $record)
            {
                foreach ($quantity as $i=>$row){
                     $ids=$id[$i];
                    if ($record->id == $ids)
                    {
                        $json_arr[$i]['id'] = $record->id;
                        $json_arr[$i]['image'] =  $record->image;
                        $json_arr[$i]['name'] =  $record->name;
                        $json_arr[$i]['quantity'] = $row;
                        $json_arr[$i]['price'] =  $record->price;
                    }
                }
            }
            file_put_contents('cart.json', json_encode($json_arr));

            $msg="<b style='margin-left: 54%;color: white;text-align: center;background: black;padding: 2%;'>Cart Updated!</b><br><br>";
        }
        if(isset($_POST['submit'])){
//            if($_SESSION["user"] == '0'){
                $total=$_POST['total'];
                if($total >= 5000.00){
                    $carts = json_decode(file_get_contents("cart.json"));
                    $successRecord[]='';
                    foreach ($carts as $cart){
                        $detail= $cart->quantity.' '.$cart->name.':'. $cart->price.'$';
                        $successRecord[] .= $detail;
                    }
                    $finalDetail=trim(implode(',',$successRecord), ",");
                    $new_order = array(
                        "username" => "omar",
                        "status" => "pending",
                        "details" => $finalDetail,
                        "total" => $total."$",
                    );
                    if(filesize("success.json") == 0){
                        $first_record = array($new_order);
                        $data_to_save = $first_record;
                    }else{
                        $old_records = json_decode(file_get_contents("success.json"));
                        array_push($old_records, $new_order);
                        $data_to_save = $old_records;
                    }

                    $encoded_data = json_encode($data_to_save, JSON_PRETTY_PRINT);

                    if(!file_put_contents("success.json", $encoded_data, LOCK_EX)){
                        $msg = "<b style='margin-left: 54%;color: white;text-align: center;background: red;padding: 2%;'>Error storing message, please try again</b><br>";
                    }else{
                        $msg="<b style='margin-left: 54%;color: white;text-align: center;background: black;padding: 2%;'>Order has been sent to admin for approval</b><br><br>";

                    }

                }else{
                    $carts = json_decode(file_get_contents("cart.json"));
                    $approvedRecord[]='';
                    foreach ($carts as $cart){
                        $detail= $cart->quantity.' '.$cart->name.':'. $cart->price.'$';
                        $approvedRecord[] .= $detail;
                    }
                    $finalDetail=trim(implode(',',$approvedRecord), ",");
                    $new_order = array(
                        "username" => "omar",
                        "status" => "approved",
                        "details" => $finalDetail,
                        "total" => $total."$",
                    );
                    if(filesize("approved.json") == 0){
                        $first_record = array($new_order);
                        $data_to_save = $first_record;
                    }else{
                        $old_records = json_decode(file_get_contents("approved.json"));
                        array_push($old_records, $new_order);
                        $data_to_save = $old_records;
                    }

                    $encoded_data = json_encode($data_to_save, JSON_PRETTY_PRINT);

                    if(!file_put_contents("approved.json", $encoded_data, LOCK_EX)){
                        $msg = "<b style='margin-left: 54%;color: white;text-align: center;background: red;padding: 2%;'>Error storing message, please try again</b><br>";
                    }else{
                        $msg="<b style='margin-left: 54%;color: white;text-align: center;background: black;padding: 2%;'>Order has been approved</b><br><br>";

                    }

                }
            unset ($carts);
            file_put_contents('cart.json', $carts);
//            }
        }
        ?>
        <form method="post">
            <?=@$msg?>
        <div class="small-container product-page" >
            <table>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
                <tbody>
                <?php
                $records = json_decode(file_get_contents("cart.json"));
                if($records){
                    $totalPrice="0";
                foreach ($records as $record){
                    $totalPrice+=$record->price * $record->quantity;
                    $tax=($totalPrice / 100) * 15;
                ?>
                <tr>
                    <td>
                        <div class="cart-info">
                            <img src="<?=$record->image?>">
                            <div>
                                <p><?=$record->name?></p>
                                <small>Price: <?= $record->price?>$</small>
                                <br>
                                <small>
                                    <a href="delete.php?id=<?=$record->id?>">Remove</a>
                                </small>
                            </div>
                        </div>
                    </td>
                    <td><input type="number" name="quantity[]" value="<?=$record->quantity?>"></td>
                    <td> <?= $record->price * $record->quantity ?>$</td>
                    <input type="number" name="id[]" value="<?=$record->id?>" hidden>
                </tr>
                <?php
                }
                }
                ?>
                </tbody>
            </table>
            <div class="total-price">
                <table>
                    <tr>
                        <td>Subtotal</td>
                        <td><?=$totalPrice?>$</td>
                    </tr>
                    <tr>
                        <td>Tax</td>
                        <td><?=$tax?>$</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td><?=$totalPrice + $tax?>$</td>
                        <input type="text" value="<?=$totalPrice + $tax?>" name="total" hidden>
                    </tr>
                </table>
            </div>
        </div>

        <button type="submit" name="update" class="butt" style="margin-left: 74%; margin-bottom: 1%">Update Cart</button>
        <button type="submit" class="button" name="submit" style="margin-left: 1%; margin-bottom: 1%">Place an Order</button>
        </form>

    </main style="padding:5%">
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
