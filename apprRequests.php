<?php
    $requestInfo = json_decode(file_get_contents("./requests.json"),true);
    $j = 0;
    while(isset($requestInfo[strval($j)])){
        echo $requestInfo[strval($j)]["username"];
        echo "\n";
        echo $requestInfo[strval($j)]["status"];
        echo "\n";
        echo $requestInfo[strval($j)]["details"];
        echo "\n";
        echo $requestInfo[strval($j)]["total"];
        $j++;
    }
?>