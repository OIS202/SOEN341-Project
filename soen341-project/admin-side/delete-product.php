<?php

$productName = $_GET['name'];

$products = fopen("C:/xampp\htdocs/edit-product/myProducts.csv", "a+");
$output = fopen("C:/xampp\htdocs/edit-product/temp-myProducts.csv", 'a+');

if ($products == false) {
    echo "error opening the file!";
    exit();
}

$found = FALSE;
$line = 0;
$data = "";
while (($row = fgetcsv($products, 1000, ",")) !== FALSE) {
    if ($row[1] !== $productName) {
        fputcsv($output, $row);
        $string = file_get_contents("C:/xampp\htdocs/edit-product/temp-myProducts.csv");
        $data = explode("\n", $string);
    }
}

file_put_contents('C:/xampp\htdocs/edit-product/myProducts.csv', implode(PHP_EOL, $data));
unlink("C:/xampp\htdocs/edit-product/myProducts.csv");
fclose($products);
fclose($output);
$products1 = rename('C:/xampp\htdocs/edit-product/temp-myProducts.csv', 'C:/xampp\htdocs/edit-product/myProducts.csv');

include ('list-product.php');
?>
