<?php

$conn = new mysqli("localhost", "root", "", "zion_test_db");

if ($conn->connect_error){
    die("Connection Failed!">$conn->connect_error);
}


ini_set("display_errors", "1");
error_reporting(E_ALL);

$result = array('error'=>false);
$action = "";


$itemkey = $_POST['itemkey'];

if(isset($_GET['action'])){

    $action = $_GET['action'];

}


if($action == "read"){

    $sql = $conn->query("SELECT * FROM ALL_ITEM WHERE itemkey='$itemkey' ");



    $show_one_item = array();



    while ($row = $sql->fetch_assoc()){


        array_push($show_one_item, $row);

    }

    $result['show_one_item'] = $show_one_item;

    echo json_encode($result);

}

?>