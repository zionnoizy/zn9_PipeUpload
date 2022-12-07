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


$item = $_POST['item'];
echo "=1. ", $catagory ,"\n";
echo "=2. \n"; 

//create table
$abc = "CREATE TABLE IF NOT EXISTS ALL_ITEM (I_NAME VARCHAR(50) NOT NULL, I_CODE VARCHAR(50) NOT NULL,
I_DESCRIPTION VARCHAR(50) NOT NULL, I_VARIANT VARCHAR(50) NOT NULL, I_IMAGE VARCHAR(100) NOT NULL, I_TECH_SHEET VARCHAR(50) NOT NULL, 
II_MFUG VARCHAR(50) NOT NULL, II_MATERIAL VARCHAR(50) NOT NULL, II_CATAGORY VARCHAR(50) NOT NULL, II_SUBCATAGORY VARCHAR(50) NOT NULL); ";

$run = $conn -> query($abc);

echo "=3. ", $run; 

/*
//*setup upload image first
$imagename = $_FILES["uploadfilename"]
$tempname = $_FILES["uploadfile"]["tmp_name"]; //? what's this
$folder = "./upload_image/". $imagename;

//do: INSERT INTO ALL_ITEM (I_IMAGE) VALUES('$imagename');
move_uploaded_file($tempname, $folder)
*/


if($run){
  
  echo "=4. tablet created\n";
  //DEFAULT
  $sql = "INSERT INTO ALL_ITEM VALUES ( DEFAULT, '$subcatagory',
  '3','4','5I_IMAGE', '6', 
  '7', '8', '9', '10'); ";


}else{

  echo "=4. table NOT created\n";

}  


?>