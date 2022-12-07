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
$catagory = $_POST['catagory'];
echo "-1. ", $catagory ,"\n";
echo "-2. \n"; 

//CATAGORY_KEY int NOT NULL AUTO_INCREMENT, ... , PRIMARY KEY (CATAGORY_KEY)
$abc = "CREATE TABLE IF NOT EXISTS ALL_CATAGORY (CATAGORY_KEY int AUTO_INCREMENT primary key NOT NULL, CATAGORY_NAME VARCHAR(50) NOT NULL ); ";
 
$def = "ALTER TABLE ALL_CATAGORY AUTO_INCREMENT=1;";
$run = $conn -> query($abc);
echo "-3. ", $run; 

if($run){
  
  echo "-4. DEBUG: INSER_T $catagory UPLOADED\n";
  
  //DEFAULT
  $sql = "INSERT INTO ALL_CATAGORY VALUES ( DEFAULT, '$catagory'); ";

  if (mysqli_query($conn, $sql )){
    print ("-5.Company Added v2.");
  }
  else{
    print ("-5.Error!".mysqli_error($conn));
  }

}else{
  echo "-4. DEBUG: INSER_T $catagory INFO NOT UPDATED\n";
}  