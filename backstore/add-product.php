<?php
$file = new SplFileObject("./database/myProducts.csv", "r");
$file->seek(PHP_INT_MAX);
$id = $file->key()+1;
$product = [];
if (($handle = fopen("./database/myProducts.csv", "r")) !== FALSE) {
    while (($row = fgetcsv($handle)) !== FALSE) {
        if ($row[0] == $id) {
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
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon/favicon-16x16.png">

    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Londrina+Solid:wght@100;300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/45836f3eb4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/uikit@3.6.15/dist/css/uikit.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link rel="stylesheet" href="styylee.css">

    <title>Edit/save Products</title>

</head>

<body>

<nav class="uk-navbar-container backstore-nav" >
    <div class="uk-navbar-left">

        <ul class="uk-navbar-nav">
            <li class="uk-active"><a href="../index.html"><img src="../assets/images/logo.png" style="height: 85px;"></a></li>

            <li class="uk-active">
                <a href="product-list.php">Products</a>
            </li>

            <li class="uk-active">
                <a href="user-list.php">Users</a>
            </li>
            <li class="uk-active">
                <a href="order-list.php">Orders</a>
            </li>
        </ul>

    </div>
</nav>



<div class="d-flex justify-content-center align-items-center signBack-container">
    <form enctype="multipart/form-data" class="sign-form text-center" method="post" action="product-add.php">
        <h1 class="mb-5 font-weight-light">Edit products</h1>


        <input type="hidden" name="id" value=<?php echo $id;?> />

        <label class="label">Enter new product name:</label>
        <div class="form-group mb-2">
            <input name="newname" id="name" class="form-control form-control-lg" placeholder="Name" value="<?php echo isset($product[1]) ? ($product[1]) : '' ?>"
            >
        <label class="label">Enter new product description:</label>
        <div class="form-group mb-2">
            <input name="newdesc" id="newdesc" class="form-control form-control-lg" placeholder="Description" value="<?php echo isset($product[6]) ? ($product[6]) : '' ?>"
            >
        </div>
        <label class="label">Enter new price:</label>
        <div class="form-group mb-2">
            <input name="newprice" id="newprice" class="form-control form-control-lg" placeholder="Price"
                   value="<?php echo isset($product[2]) ? ($product[2]) : '' ?>">
        </div>
        <label class="label">Enter new quantity type:</label>
        <div class="form-group mb-2">
            <input name="newqty" id="quantityType" class="form-control form-control-lg" placeholder="Quantity Type" value="<?php echo isset($product[3]) ? ($product[3]) : '' ?>">
        </div>
        <label class="label">Upload new image file:</label>
        <div class="custom-file">
            <input type="file" name="newimage" class="custom-file-input" id="image" required accept="image/*">
            <label class="custom-file-label" for="image"><?php echo isset($product[4]) ? ($product[4]) : 'Choose file' ?></label>
        </div>
        <label class="label">Enter new product aisle:</label>
        <div class="form-group col-md-6">
            <select id="aisle" name="newsect" class="form-control ">

                <option selected ><?php echo isset($product[5]) ? ($product[5]) : '' ?></option>

                <option>Fruits and Vegetables</option>
                <option>Meat and Poultry</option>
                <option>Snacks</option>
                <option>Beverages</option>
                <option>Bread And Bakery</option>
                <option>Dairy And Eggs</option>
                <option>Test Option</option>

            </select>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" onclick="" >Save changes</button>

        </div>
    </form>
</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

<script src="https://kit.fontawesome.com/45836f3eb4.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="../assets/js/backstore.js"></script>



</body>

</html>