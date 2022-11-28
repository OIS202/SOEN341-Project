<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta content='maximum-scale=1.0, initial-scale=1.0, width=device-width' name='viewport'>


    <link rel="stylesheet" type="text/css" href="../client-side/list-product.css">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Londrina+Solid:wght@100;300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/45836f3eb4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/uikit@3.6.15/dist/css/uikit.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Product List</title>

</head>

<body>

<nav class="uk-navbar-container backstore-nav" >
    <div class="uk-navbar-left">

        <ul class="uk-navbar-nav">
            <li class="uk-active"><a href="../client-side/homepage.html"><img src="../logo.png" style="height: 85px;"></a></li>

            <li class="uk-active"><a href="list-product.html">Products</a></li>

            <li class="uk-active">
                <a href="">Users</a>
            </li>
            <li class="uk-active">
                <a href="">Orders</a>
            </li>
        </ul>

    </div>
</nav>


<div class="row" style="margin-top: 50px; margin-left: 10px; margin-right: 10px">
    <div class="col-sm-10 order-title">
        <h1>Products</h1>
    </div>
    <div class="col-sm-2">
        <a href=""><button type="button" id="add-button" class="btn btn-success" onclick=""><i class="fas fa-plus"></i> Add</button></a>
    </div>
</div>


<?php
$products = fopen("database/myProducts.csv", "r");
echo "<table id='product-table' class='table table-striped order-table'\n\n>
    <thead>
    <tr>
            <th scope='col'>Product name</th>
            <th scope='col'>Price</th>
            <th scope='col'>Section</th>
            <th scope='col'></th>
    </tr>
    </thead>
    <tbody id='tbody'>";

while (($row = fgetcsv($products)) !== false) {
    echo "<tr>";
    $productName =  $row[1];
    echo "<td>" . htmlspecialchars($row[1]) . "</td>";
    echo "<td>" . htmlspecialchars($row[2]) . "</td>";
    echo "<td>" . htmlspecialchars($row[5]) . "</td>";
    echo "<td><a href='../backstore/edit-product.php?id=$row[0]'><button type='button' class='btn btn-primary btn-sm' style='margin-right: 4px;'>Edit</button></a><a href='../backstore/delete-product.php?name=$productName'><button onclick='' type='submit' class='btn btn-danger btn-sm'>Remove</button></a></td>";
    echo "</tr>\n";
}
fclose($products);
echo "\n</table>";

?>

</body>
</html>
