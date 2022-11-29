<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    
    <link rel="stylesheet" type="text/css" href="ListUsers.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
   
</head>
<body>
    <header>
        <div class="main">
            <div class="logo">
                <img src="../img/logo.png">
            </div>
            <ul>
                <li><a href="../Admin Soen341/index.html">Home</a></li>
                <li><a href="../backstore/edit-product.php">Edit Product</a></li>
                <li><a href="../backstore/list-product.php">List Product</a></li>
                <li><a href="EditUser.php">Edit User</a></li>
                <li><a href="ListUsers.php">List User</a></li>
                <li><a href="../autolistrequests.php">List Requests</a></li>
            </ul>
        </div>
    </header>

    <main>
        <div class="row mb-5">
            <div class="col-lg-6 offset-3">
            <table class="content-table ">
          <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th># Of Requests</th>
            <th>Action</th>
          </thead>
          <tbody>
          <?php
          $userInfo = json_decode(file_get_contents("userlist.JSON", "userlist.JSON"),true);
          $i = 0;
          //echo $userInfo[$i]["firstname"];
          while(isset($userInfo[$i]))
          {
              echo "<tr>";
              echo "<td>". $userInfo[strval($i)]["name"] ."</td>";
              echo "<td>". $userInfo[strval($i)]["email"] ."</td>";
              echo "<td>". $userInfo[strval($i)]["phone_number"] ."</td>";
              echo "<td>". $userInfo[strval($i)]["n_request"] ."</td>";
              echo "<td>". "<a class='button' href='EditUser.php?action=edit&id=".strval($i)."'><i class='fa fa-edit'></i></a>" ." ". "<a class='button' href='ListUsers.php?action=delete&id=".strval($i)."'><i class='fa fa-trash'></i></a>" ."</td>";
            //   echo "<td>". "<a class='button' href='ListUsers.php?action=delete&id=".strval($i)."'>Delete User</a>" ."</td>"; 
              echo "</tr>";
              $i++;
          }
          echo "<tr>";
        
        //   echo "<td>". "<a class='button' href='EditUser.php?action=edit&id=".strval($i)."'>Edit User</a>" ." ". "<a class='button' href='ListUsers.php?action=delete&id=".strval($i)."'>Delete User</a>" ."</td>";
          echo "<td>". " <a class='button'  href='EditUser.php?action=add'><i class='fa fa-plus'></i></a>" ."</td>"; 
          echo "</tr>";
          ?>
           <!-- <a class="button" class="btn btn-primary" href="EditUser.php?action=add">Add user</a> -->
          </tbody>
         
      </table>
         
            </div>
        </div>
    
      <!-- <div class="list-user-footer">
        <a class="button" href="EditUser.php?action=add">Add user</a>
      </div> -->
    </main>

    <?php
    if(isset($_GET['action'])){
       if($_GET['action']=='delete')
       {
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            unset($userInfo[$id]); 
            $userInfo = array_values($userInfo);
            file_put_contents("userlist.JSON", json_encode($userInfo, JSON_PRETTY_PRINT));
            header("Location: ListUsers.php");
          }
    }
      
    
    }
  ?>
    <footer class="footer mt-5">
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