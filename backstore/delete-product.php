<?php

$productName = $_GET['name'];

$products = fopen("database/myProducts.csv", "a+");
$output = fopen("database/temp-myProducts.csv", 'a+');

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
        $string = file_get_contents("database/temp-myProducts.csv");
        $data = explode("\n", $string);
    }
}

file_put_contents('database/myProducts.csv', implode(PHP_EOL, $data));
unlink("database/myProducts.csv");
fclose($products);
fclose($output);
$products1 = rename('database/temp-myProducts.csv', 'database/myProducts.csv');

include ('list-product.php');
?>
