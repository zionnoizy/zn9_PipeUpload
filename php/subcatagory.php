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
$subcatagoryname = $_POST['subcatagoryname'];
$choosen_catagory = $_POST['choosen_catagory'];

echo "%%1. ", $subcatagoryname ,"\r\n";
echo "%%2. \n", $choosen_catagory; 


$find_choosen = "SELECT catagorykey FROM ALL_CATAGORY WHERE catagoryname='$choosen_catagory'";
$run = mysqli_query($conn, $find_choosen);
  if($run){
      while($row = mysqli_fetch_array($run)){
          $fc = $row['catagorykey'];
          echo "%%2.5, $fc";
      }
  }

$abc = "CREATE TABLE IF NOT EXISTS ALL_SUBCATAGORY (subcatagorykey int AUTO_INCREMENT primary key NOT NULL, subcatagoryname VARCHAR(50) NOT NULL,
choosen_catagorykey VARCHAR(50) NOT NULL, choosen_catagoryname VARCHAR(50) NOT NULL ); ";
 
$def = "ALTER TABLE ALL_SUBCATAGORY AUTO_INCREMENT=1;";
$run = $conn -> query($abc);
echo "%%3. ", $run; 

if($run){
  
  echo "%%4. DEBUG: INSER_T $subcatagoryname UPLOADED\n";
  
  //DEFAULT
  $sql = "INSERT INTO ALL_SUBCATAGORY VALUES ( DEFAULT, '$subcatagoryname', '$fc', '$choosen_catagory'); ";

  if (mysqli_query($conn, $sql )){
    print ("%%5.Company Added v2.");
  }
  else{
    print ("%%5.Error!".mysqli_error($conn));
  }

}else{
  echo "%%4. DEBUG: INSER_T $subcatagoryname INFO NOT UPDATED\n";
}  