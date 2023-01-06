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


$get_itemkey = $_GET['itemkey'];
echo "[][][][][][][][] ", $get_itemkey;



$sql = "DELETE FROM ALL_ITEM WHERE itemkey='$get_itemkey'";


if (mysqli_query($conn, $sql )){

    print ("[deleted] v999.");
    $result['message'] = "user update successfully.";

}
else{
    $result['error'] = true;
}

?>