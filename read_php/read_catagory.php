<?php
Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed
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

    $sql = $conn->query("SELECT * FROM ALL_CATAGORY");


    $show_all_catagory = array();



    while ($row = $sql->fetch_assoc()){


        array_push($show_all_catagory, $row);

    }

    $result['show_all_catagory'] = $show_all_catagory;
    //tranlate array to json
    echo json_encode($result);

}

?>