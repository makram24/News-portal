<?php
require 'header2.php';
if(isset($_SESSION['id'])){
  $id=$_SESSION['id'];
  if(isset($_POST['submit'])){
    $itemname = $_POST['itemname'];
    $itemprice = $_POST['itemprice'];
    $categoryid = $_POST['categoryid'];
    $boxprice = $_POST['boxprice'];
    $itembarcode = $_POST['itembarcode'];
    $boxquantity = $_POST['boxquantity'];
    $q="SELECT * from items order by id desc limit 1;";
    $r=$mysqli->query($q);
    confirm_query($r);
    $i=0;
    if($r->num_rows>0){
      $info=$r->fetch_array();
      $i = $info['id'];
    }
    $i++;
    $insert = "INSERT INTO items (id,item_name,price,cat_id,box_price,Barcode,box_quantity) values ('$i','$itemname','$itemprice','$categoryid','$boxprice','$itembarcode','$boxquantity');";
    $res = $mysqli->query($insert);
    confirm_query($res);
    echo "<script> location = 'settings.php?add=true';</script>";
  }
}
else echo "<script> location = 'index.php';</script>";
?>
