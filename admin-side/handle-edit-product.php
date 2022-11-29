<?php
$productid = $_POST['id'];
$newname = $_POST['newname'];
$newprice = $_POST['newprice'];
$newdesc = $_POST['newdesc'];
$newsect = $_POST['newsect'];

$products = fopen("./myProducts.csv", "a+"); //Change directory
$output = fopen("./temp-myProducts.csv", 'a+'); //Change directory

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
        $row[3] = $newprice;
        $row[6] = $newsect;
        $row[7] = $newdesc;
    }
    fputcsv($output, $row);
    $string = file_get_contents("./temp-myProducts.csv"); 
    $data = explode("\n", $string);
}

file_put_contents('./myProducts.csv', implode(PHP_EOL, $data));
unlink("./myProducts.csv");
fclose($products);
fclose($output);
$products1 = rename('./temp-myProducts.csv', './myProducts.csv');

header("Location: ./list-product.php")
?>