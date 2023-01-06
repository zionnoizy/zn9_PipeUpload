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
//echo $itemname, $itemcode, $itemdescription, $itemvariant;

//
$ichoosen_mfug = $_POST['choosen_mfug'];

//echo "test is first..", $ichoosen_mfug;

$ichoosen_material = $_POST['choosen_material'];
$ichoosen_catagory = $_POST['choosen_catagory'];
$ichoosen_subcatagory = $_POST['choosen_subcatagory'];

$find_mfugkey = "SELECT mfugkey FROM ALL_MFUG WHERE mfugname='$ichoosen_mfug'";
$run1 = mysqli_query($conn, $find_mfugkey);
if($run1){
    while($row = mysqli_fetch_array($run1)){
        $mfugk = $row['mfugkey'];
        //echo "%%2.6, $mfugk";
    }
}
$find_materialkey = "SELECT materialkey FROM ALL_MATERIAL WHERE materialname='$ichoosen_material'";
$run2 = mysqli_query($conn, $find_materialkey);
if($run2){
    while($row = mysqli_fetch_array($run2)){
        $mk = $row['materialkey'];
        //echo "%%2.7, $mk";
    }
}
$find_catagorykey = "SELECT catagorykey FROM ALL_CATAGORY WHERE catagoryname='$ichoosen_catagory'";
$run3 = mysqli_query($conn, $find_catagorykey);
if($run3){
    while($row = mysqli_fetch_array($run3)){
        $ck = $row['catagorykey'];
        //echo "%%2.8, $ck";
    }
}
$find_subcatagorykey = "SELECT subcatagorykey FROM ALL_SUBCATAGORY WHERE subcatagoryname='$ichoosen_subcatagory'";
$run4 = mysqli_query($conn, $find_subcatagorykey);
if($run4){
    while($row = mysqli_fetch_array($run4)){
        $sck = $row['subcatagorykey'];
        //echo "%%2.9, $sck";
    }
}


//create table
$abc = "CREATE TABLE IF NOT EXISTS ALL_ITEM (itemkey int AUTO_INCREMENT primary key NOT NULL, itemname VARCHAR(50) NOT NULL, itemcode VARCHAR(50) NOT NULL,
  itemdescription VARCHAR(50) NOT NULL, itemvariant VARCHAR(50) NOT NULL, itemimage VARCHAR(100) NOT NULL, itemtc VARCHAR(50) NOT NULL, 
  ichoosen_mfug VARCHAR(50) NOT NULL, ichoosen_material VARCHAR(50) NOT NULL, ichoosen_catagory VARCHAR(50) NOT NULL, ichoosen_subcatagory VARCHAR(50) NOT NULL,
  ichoosen_mfugkey VARCHAR(50) NOT NULL, ichoosen_materialkey VARCHAR(50) NOT NULL, ichoosen_catagorykey VARCHAR(50) NOT NULL, ichoosen_subcatagorykey VARCHAR(50) NOT NULL
  ); ";


$run = $conn -> query($abc);

$result_msg = '';
$result_msg2 = '';

//1deal with image
////////////////////////////////////////////////////////
if(isset($_FILES["iii"]["name"])) {

  $errors= array();
  
  $file_name = $_FILES['iii']['name'];
  $file_size =$_FILES['iii']['size'];
  $file_tmp =$_FILES['iii']['tmp_name'];
  $file_type=$_FILES['iii']['type'];

  define ('SITE_ROOT', realpath(dirname(__FILE__)));

  //change for your favorite path
  $create_path = '/opt/lampp/htdocs/products_db/stored_images/'.$itemname. "/";

  $destination = dirname(dirname(dirname(dirname(__FILE__))))."/htdocs/products_db/stored_images/".$itemname. "/";

  mkdir($create_path, 0777, true);

  echo $destination;

  
  $allow_type = array("jpeg","jpg","png",'gif');

  if (in_array($file_name, $allow_type) === false){ //if value exist in array

    $result_msg = "IMG Type allowed. \n";

    if ( move_uploaded_file( $file_tmp, $destination ) ){

      $result_msg = "IMG Success upload file. \n";
    }

  }


}
//////////////////////////////////////////////////////
if(isset($_FILES["iits"]["name"])){

  $errors= array();
  $tc = $_FILES['iits']['name'];
  $tc_size =$_FILES['iits']['size'];
  $tc_tmp =$_FILES['iits']['tmp_name'];
  $tc_type=$_FILES['iits']['type'];


  $create_path = dirname(dirname(dirname(dirname(__FILE__))))."/htdocs/products_db/stored_images/".$itemname. "/";

  $allow_type = array("pdf");
  if(!file_exists($tc)){

    $result_msg2 = "TC File does not exist @@b. \n";

    if(in_array($tc, $allow_type)) { //if value exist in array


      if(move_uploaded_file( $tc_tmp, $create_path )){

        $result_msg2 = "TC Success upload tc. \n";
      }
    }
    else{

      $result_msg2 = "TC not allowed type.";
    }
  }

}
//////////////////////////////////////////////////////
if($run){
  

  //DEFAULT
  $sql = "INSERT INTO ALL_ITEM VALUES ( DEFAULT, '$itemname', '$itemcode', 
          '$itemdescription', '$itemvariant','$file_name', '$tc', 
          '$ichoosen_mfug', '$ichoosen_material', '$ichoosen_catagory', '$ichoosen_subcatagory',
          '$mfugk', '$mk', '$ck', '$sck'
          ); ";

  if (mysqli_query($conn, $sql )){

    print (".Company Added v2.");

  }

  else{
    print ("error!".mysqli_error($conn));
  }

  $get_cur_itemkey = "SELECT itemkey FROM ALL_ITEM WHERE itemname='$itemname'";

  $fci = mysqli_query($conn, $get_cur_itemkey);
  if ($fci){
    while($row = mysqli_fetch_array($fci)){
        $cpy_id = $row['itemkey'];
    }
  }
}


//////////////////////////////////////////////////////////////////////////////////////////
echo $result_msg;
echo $result_msg2;

?>