<?php

$conn = new mysqli("localhost", "root", "", "zion_test_db");

if ($conn->connect_error){
    die("Connection Failed!">$conn->connect_error);
}


ini_set("display_errors", "1");
error_reporting(E_ALL);

$result = array('error'=>false);
$action = "";



if(isset($_GET['action'])){

    $action = $_GET['action'];

}


if($action == "read"){

    $sql = $conn->query("SELECT * FROM ALL_ITEM");



    $show_all_item = array();



    while ($row = $sql->fetch_assoc()){


        array_push($show_all_item, $row);

        //print_r ( $show_all_item);
    }

    $result['show_all_item'] = $show_all_item;
    //tranlate array to json
    echo json_encode($result);

    //echo $result['show_all_item'];
    //print_r ($result['show_all_item']);
}

?>