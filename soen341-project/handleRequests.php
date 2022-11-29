<?php
    if(isset($_GET['action'])){//$_POST['newname']
        $action = $_GET['action'];
        //echo $action;
    }
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        //echo $id;
    }
    //
    $requestInfo = json_decode(file_get_contents("./requests.json"),true);
    $status = $action."d";
    $requestInfo[strval($id)]["status"] = $status;
    echo $requestInfo[strval($id)]["status"];
    $jsonString = json_encode($requestInfo,JSON_PRETTY_PRINT);
    $fp = fopen("./requests.json",'w');
    fwrite($fp,$jsonString);;
    fclose($fp);
    header("Location: ./autolistrequests.php");
?>