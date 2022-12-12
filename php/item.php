<?php

$conn = new mysqli("localhost", "root", "", "zion_test_db");

if ($conn->connect_error){
    die("Connection Failed!">$conn->connect_error);
}
else{
    echo "Connection Success!\r\n";
}




$itemcode = $_POST['item_code'];
$itemdescription = $_POST['item_description'];
$itemvariant = $_POST['item_variant'];


//image
$filename = $_FILES["iii"]["name"];



$folder = "/stored_images/" . $filename;

if (move_uploaded_file($filename, $folder)){
  echo "uploaded.";
}
else{
  ini_set("display_errors", "1");
error_reporting(E_ALL);
  echo "not uploaded.    ".$_FILES["iii"]["error"];

}

echo $filename, '====', '====', $folder;


//create table
// $abc = "CREATE TABLE IF NOT EXISTS ALL_ITEM (I_NAME VARCHAR(50) NOT NULL, I_CODE VARCHAR(50) NOT NULL,
// I_DESCRIPTION VARCHAR(50) NOT NULL, I_VARIANT VARCHAR(50) NOT NULL, I_IMAGE VARCHAR(100) NOT NULL, I_TECH_SHEET VARCHAR(50) NOT NULL, 
// II_MFUG VARCHAR(50) NOT NULL, II_MATERIAL VARCHAR(50) NOT NULL, II_CATAGORY VARCHAR(50) NOT NULL, II_SUBCATAGORY VARCHAR(50) NOT NULL); ";

// $run = $conn -> query($abc);

// echo "=3. ", $run; 




if($run){
  
  echo "=4. tablet created\n";
  //DEFAULT
  $sql = "INSERT INTO ALL_ITEM VALUES ( DEFAULT, '$subcatagory',
  '3','4','$filename', '6', 
  '7', '8', '9', '10'); ";
  if (move_uploaded_file($tempname, $folder)) {
    echo "<h3>  Image uploaded successfully!</h3>";
  } else {
    echo "<h3>  Failed to upload image!</h3>";
  }

}else{

  echo "=4. table NOT created\n";

}  


?>