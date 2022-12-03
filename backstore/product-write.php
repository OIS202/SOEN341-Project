<?php
$productid = $_POST['id'];
$newname = $_POST['newname'];
$newprice = $_POST['newprice'];
$newdesc = $_POST['newdesc'];
$newqty = $_POST['newqty'];
$newimg = $_POST['newimage'];
$newsect = $_POST['newsect'];

$products = fopen("./database/myProducts.csv", "a+"); //Change directory
$output = fopen("./database/temp-myProducts.csv", 'a+'); //Change directory

if ($products == false) {
    echo "error opening the file!";
    exit();
}

$found = FALSE;
$line = 0;
$data = "";
while ($row = fgetcsv($products, 1000, ",")) {
    if ($row[0] == $productid) {
        $row[1] = $newname;
        $row[2] = $newprice;
        $row[3] = $newqty;
        $row[4] = $newimg;
        $row[5] = $newsect;
        $row[6] = $newdesc;
    }
    fputcsv($output, $row);
    $string = file_get_contents("./database/temp-myProducts.csv"); 
    $data = explode("\n", $string);
}

file_put_contents('./database/myProducts.csv', implode(PHP_EOL, $data));
unlink("./database/myProducts.csv");
fclose($products);
fclose($output);
$products1 = rename('./database/temp-myProducts.csv', './database/myProducts.csv');

header("Location: ./list-product.php")
?>