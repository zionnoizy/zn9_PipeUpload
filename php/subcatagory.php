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

//
$subcatagory = $_POST['subcatagory'];
echo "-1. ", $subcatagory ,"\n";
echo "-2. \n"; 

//SUBCATAGORY_KEY int NOT NULL AUTO_INCREMENT, ... , PRIMARY KEY (SUBCATAGORY_KEY)
$abc = "CREATE TABLE IF NOT EXISTS ALL_SUBCATAGORY (SUBCATAGORY_KEY int AUTO_INCREMENT primary key NOT NULL, SUBCATAGORY_NAME VARCHAR(50) NOT NULL ); ";
 
$def = "ALTER TABLE ALL_SUBCATAGORY AUTO_INCREMENT=1;";
$run = $conn -> query($abc);
echo "-3. ", $run; 

if($run){
  
  echo "-4. DEBUG: INSER_T $subcatagory UPLOADED\n";
  
  //DEFAULT
  $sql = "INSERT INTO ALL_SUBCATAGORY VALUES ( DEFAULT, '$subcatagory'); ";

  if (mysqli_query($conn, $sql )){
    print ("-5.Company Added v2.");
  }
  else{
    print ("-5.Error!".mysqli_error($conn));
  }

}else{
  echo "-4. DEBUG: INSER_T $subcatagory INFO NOT UPDATED\n";
}  