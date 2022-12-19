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


$get_itemkey = $_POST['itemkey'];
$edit_itemname = $_POST['edit_itemname'];
$edit_itemcode = $_POST['edit_itemcode'];
$edit_itemdescription = $_POST['edit_itemdescription'];
$edit_itemvariant = $_POST['edit_itemvariant'];






$sql = "UPDATE ALL_ITEM SET 
        itemname='$edit_itemname', itemcode='$edit_itemcode', itemdescription='$edit_itemdescription', itemvariant='$edit_itemvariant'  
        WHERE itemkey='$get_itemkey'";


if (mysqli_query($conn, $sql )){

    print (".Company Edit v999.");
    $result['message'] = "user update successfully.";

}
else{
    $result['error'] = true;
}