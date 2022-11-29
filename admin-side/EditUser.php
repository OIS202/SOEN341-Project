<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CFP Materials Procurement</title>
    <link rel="stylesheet" type="text/css" href="EditUser.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>
    <header>
        <div class="main">
            <div class="logo" style = "position: relative; top:25px;">
                <img src="../img/logo.png">
            </div>
            <ul style = "position: relative; text-align: center;">
                <li><a href="../Admin Soen341/index.html">Home</a></li>
                <li><a href="../edit-product.html">Edit Product</a></li>
                <li><a href="../backstore/list-product.html">List Product</a></li>
                <li><a href="../admin-side/EditUser.html">Edit User</a></li>
                <li><a href="../admin-side/ListUsers.html">List User</a></li>
                <li><a href="../list-requests.html">List Requests</a></li>
            </ul>
        </div>
    </header>
   
   
    <main>
     
     <body>
     <?php
    if(isset($_GET['action'])){
      $action = $_GET['action']; 
    }
    if(isset($_GET['id']))
    {
      $id = $_GET['id'];
    }
    $json = json_decode(file_get_contents("userlist.JSON", "userlist.JSON"),true);
  ?>
      <div class="row">
        <div class="col-lg-6 offset-3">
         
<form method="POST" action="" class="mb-5">
<?php if($action=='add')
                   {
                    ?>
                     <h1>Add USER</h1>
                    <?php
                   }
                   else
                   {
                    ?>
                    <h1>EDIT USER</h1>
                    <?php
                   }
                   ?>
	<div class="form-group">
		<label for="">Name</label>
		<input type="text" class="form-control" name="name" <?php if(isset($id)){echo 'value = "'.$json[$id]["name"].'"';} ?> id="name" placeholder="Enter your Name">
	</div>
	<div class="form-group">
		<label for="">Email</label>
		<input type="email" class="form-control"  name="email" <?php if(isset($id)){echo 'value = "'.$json[$id]["email"].'"';} ?> id="email" placeholder="Enter your Email">
	</div>
    <div class="form-group">
		<label for="">Phone Number</label>
		<input type="text" class="form-control" name="phone_number" <?php if(isset($id)){echo 'value = "'.$json[$id]["phone_number"].'"';} ?> id="phone_number" placeholder="Enter your phone number">
	</div>
    <div class="form-group">
		<label for="">No Of Requests</label>
		<input type="text" class="form-control" name="n_request" <?php if(isset($id)){echo 'value = "'.$json[$id]["n_request"].'"';} ?> id="n_request" placeholder="Enter No Request">
	</div>
    <?php if($action=='add')
                   {
                    ?>
                         
                        	<button type="submit"  name="submit" class="btn btn-primary">Add User</button>                                                           
                            
                    
                
                    <?php
                   }
                   else
                   {
                    ?>
                       
                        	<button type="submit"  name="submit" class="btn btn-primary">Update User</button>                                                          
               
               
                    <?php
                   }
                   ?>

</form>
        </div>
      </div>
     
    </body>
 </main>   
    
</html>
<?php
      if($action == "add"){
        if(isset($_POST['submit'])){
          $json[strval(count($json))] = array(
            "name" => $_POST['name'], 
            "email" => $_POST['email'], 
            "phone_number" => $_POST['phone_number'], 
            "n_request" => $_POST['n_request']
        );
          file_put_contents("userlist.JSON", json_encode($json, JSON_PRETTY_PRINT));
          header("Location: ListUsers.php");
        }
      }
      else if($action == "edit"){
        if(isset($_POST['submit'])){
          $json[$id] = array(
            "name" => $_POST['name'], 
            "email" => $_POST['email'], 
            "phone_number" => $_POST['phone_number'], 
            "n_request" => $_POST['n_request']
           );
          file_put_contents("userlist.JSON", json_encode($json, JSON_PRETTY_PRINT));
          header("Location: ListUsers.php");
        }
      }
    ?>
     
     
   
     

    
    
    
    
    
    
    
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
