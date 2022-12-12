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

    $sql = $conn->query("SELECT * FROM ALL_SUBCATAGORY");


    $show_all_subcatagory = array();



    while ($row = $sql->fetch_assoc()){


        array_push($show_all_subcatagory, $row);

    }

    $result['show_all_subcatagory'] = $show_all_subcatagory;
    //tranlate array to json
    echo json_encode($result);

}

?>