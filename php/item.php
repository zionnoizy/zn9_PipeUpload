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



$itemname = $_POST['itemname'];
$itemcode = $_POST['itemcode'];
$itemdescription = $_POST['itemdescription'];
$itemvariant = $_POST['itemvariant'];

echo $itemname, $itemcode, $itemdescription, $itemvariant;
//1image
$filename = $_FILES["iii"]["name"];
$tempname = $filename;


$ichoosen_mfug = $_POST['choosen_mfug'];
$ichoosen_material = $_POST['choosen_material'];
$ichoosen_catagory = $_POST['choosen_catagory'];
$ichoosen_subcatagory = $_POST['choosen_subcatagory'];


//create table
$abc = "CREATE TABLE IF NOT EXISTS ALL_ITEM (itemkey int AUTO_INCREMENT primary key NOT NULL, itemname VARCHAR(50) NOT NULL, itemcode VARCHAR(50) NOT NULL,
  itemdescription VARCHAR(50) NOT NULL, itemvariant VARCHAR(50) NOT NULL, itemimage VARCHAR(100) NOT NULL, itemtc VARCHAR(50) NOT NULL, 
  ichoosen_mfug VARCHAR(50) NOT NULL, ichoosen_material VARCHAR(50) NOT NULL, ichoosen_catagory VARCHAR(50) NOT NULL, ichoosen_subcatagory VARCHAR(50) NOT NULL,
  ichoosen_mfugkey VARCHAR(50) NOT NULL, ichoosen_materialkey VARCHAR(50) NOT NULL, ichoosen_catagorykey VARCHAR(50) NOT NULL, ichoosen_subcatagorykey VARCHAR(50) NOT NULL
  ); ";


$run = $conn -> query($abc);

echo "=3. ", $run; 


//1deal with image
////////////////////////////////////////////////////////
if(isset($_FILES["iii"]["name"])){

  $errors= array();
  $file_name = $_FILES['iii']['name'];
  $file_size =$_FILES['iii']['size'];
  $file_tmp =$_FILES['iii']['tmp_name'];
  $file_type=$_FILES['iii']['type'];


  $expensions= array("jpeg","jpg","png");
  if(file_exists($file_name)) {
    echo "Sorry, file already exists.";
    }
  if(in_array($file_ext,$expensions)=== false){
     $errors[]="extension not allowed, please choose a JPEG or PNG file.";
  }

  if($file_size > 2097152){
     $errors[]='File size must be excately 2 MB';
  }

  if(empty($errors)==true){
    //".".$file_ext
    $destination = dirname(dirname(dirname(dirname(__FILE__))))."/htdocs/products_db/stored_images/";
    echo $destination;
    //chown($destination, 0755);
    //move_uploaded_file($info['name'], $destination.$info['name']);


    move_uploaded_file($file_tmp, $destination.$file_name);
    echo "Success";
    echo "<script>window.close();</script>";

  }

  else{
     print_r($errors);
  }
}
//2tc
//////////////////////////////////////////////////////
if(isset($_FILES["iits"]["name"])){
  $errors= array();
  $tc = $_FILES['iits']['name'];
  $tc_size =$_FILES['iits']['size'];
  $tc_tmp =$_FILES['iits']['tmp_name'];
  $tc_type=$_FILES['iits']['type'];



  if(empty($errors)==true){
    //".".$file_ext
    $destination2 = dirname(dirname(dirname(dirname(__FILE__))))."/htdocs/products_db/stored_tc/";

    echo $destination;
    //chown($destination, 0755);
    move_uploaded_file($info['name'], $destination2.$info['name']);


    move_uploaded_file($file_tmp, $destination2.$file_name);

    echo "Success";
    echo "<script>window.close();</script>";

  }

  else{
     print_r($errors);
  }
}


//////////////////////////////////////////////////////
if($run){
  
  echo "=4. tablet created\n";

  //DEFAULT
  $sql = "INSERT INTO ALL_ITEM VALUES ( DEFAULT, '$itemname', '$itemcode', 
          '$itemdescription', '$itemvariant','$filename', '$tc', 
          '$ichoosen_mfug', '$ichoosen_material', '$ichoosen_catagory', '$ichoosen_subcatagory',
          '12', '13', '14', '15'
          ); ";


  if (mysqli_query($conn, $sql )){
    print (".Company Added v2.");

    $get_cur_itemkey = "SELECT itemkey FROM ALL_ITEM";
  }
  else{
    print ("error!".mysqli_error($conn));
  }

  $get_cur_itemkey = "SELECT itemkey FROM ALL_ITEM  ";
  $fci = mysqli_query($conn, $get_cur_itemkey);
    if ($fci){
        while($row = mysqli_fetch_array($fci)){
            $cpy_id = $row['itemkey'];
        }
    }
    echo "$cpy_id";



}else{

  echo "=4. table NOT created\n";

}  


?>