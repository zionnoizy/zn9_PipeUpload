<?php

$conn = new mysqli("localhost", "root", "", "zion_test_db");

if ($conn->connect_error){
    die("Connection Failed!">$conn->connect_error);
}
else{
    echo "Connection Success!\r\n";
}

ini_set("display_errors", "1");
error_reporting(E_ALL);








if(isset($_GET['action'])){
    $action = $_GET['action'];
    echo $action;
}
else{
    echo "no action.";
}

if($action == "read"){

    $sql = $conn->query("SELECT MFUG FROM ALL_MFUG");
    $show_all_mfug = array();

    while ($row = $sql->fetch_assoc()){
        array_push($users, $row);
    }

    $result['alll_mfug'] = $show_all_mfug;

}

?>