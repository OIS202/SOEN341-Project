<?php
$id=$_GET['id'];
$records = json_decode(file_get_contents("cart.json"));
foreach ($records as $i => $record)
{
    if ($record->id == $id)
    {
        unset ($records[$i]);
        $save = json_encode(array_values($records), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        file_put_contents('cart.json', $save);
        header("Location: ./cart.php");
    }
}