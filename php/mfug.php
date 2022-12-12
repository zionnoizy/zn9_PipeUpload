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
$mfug = $_POST['mfug'];
echo "-1. ", $mfug ,"\n";
echo "-2. \n"; 

//MFUG_KEY int NOT NULL AUTO_INCREMENT, ... , PRIMARY KEY (MFUG_KEY)
$abc = "CREATE TABLE IF NOT EXISTS ALL_MFUG (mfugkey int AUTO_INCREMENT primary key NOT NULL, mfugname VARCHAR(50) NOT NULL ); ";
 
$def = "ALTER TABLE ALL_MFUG AUTO_INCREMENT=1;";
$run = $conn -> query($abc);
echo "-3. ", $run; 

if($run){
  
  echo "-4. DEBUG: INSER_T $mfug UPLOADED\n";
  
  //DEFAULT
  $sql = "INSERT INTO ALL_MFUG VALUES ( DEFAULT, '$mfug'); ";

  if (mysqli_query( $conn, $sql )){
    print ("-5.Company Added v2.");
  }
  else{
    print ("-5.Error!".mysqli_error($conn));
  }

}else{
  echo "-4. DEBUG: INSER_T $mfug INFO NOT UPDATED\n";
}  









?>