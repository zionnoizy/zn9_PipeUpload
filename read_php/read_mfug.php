<?php

$conn = new mysqli("localhost", "root", "", "zion_test_db");

if ($conn->connect_error){
    die("Connection Failed!">$conn->connect_error);
}

ini_set("display_errors", "1");
error_reporting(E_ALL);


/*
$sql = "SELECT MFUG_NAME FROM ALL_MFUG";
$result = mysqli_query($conn, $sql);

$json = array(); 
while($row = mysqli_fetch_assoc($result)) { 
  $json[] = $row;


}
mysqli_free_result($result);
echo json_encode( $json, JSON_UNESCAPED_SLASHES );
*/
//////////////////////

$result = array('error'=>false);
$action = "";

//?action=read
if(isset($_GET['action'])){

    $action = $_GET['action'];
    //echo $action;

}
if($action == "read"){

    $sql = $conn->query("SELECT * FROM ALL_MFUG");



    $show_all_mfug = array();



    while ($row = $sql->fetch_assoc()){


        array_push($show_all_mfug, $row);

        //print_r ( $show_all_mfug);
    }

    $result['show_all_mfug'] = $show_all_mfug;
    //tranlate array to json
    echo json_encode($result);

    //echo $result['show_all_mfug'];
    //print_r ($result['show_all_mfug']);
}

?>