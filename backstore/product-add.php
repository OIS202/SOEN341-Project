<?php
$productid = $_POST['id'];
$newname = $_POST['newname'];
$newprice = $_POST['newprice'];
$newdesc = $_POST['newdesc'];
$newqty = $_POST['newqty'];
$newimg = $_POST['newimage'];
$newsect = $_POST['newsect'];

echo $productid;

$products = fopen("./database/myProducts.csv", "a+"); //Change directory

if ($products == false) {
    echo "error opening the file!";
    exit();
}

$found = FALSE;
$line = 0;
$data = "";

$newproduct = $productid.','.$newname.','.$newprice.','.$newqty.','.$newimg.','.$newsect.','.$newdesc;

fputcsv($products, explode(',', $newproduct));
fclose($products);

header("Location: ./list-product.php")
?>