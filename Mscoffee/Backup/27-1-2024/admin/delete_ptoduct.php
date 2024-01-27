<?php
include_once('../config.php');
$id=$_GET['ProID'];
$query="DELETE FROM `tblproduct` WHERE `pro_id` ='$id'";
$resulf=mysqli_query($conn,$query);

if(!$resulf){
    die('error'.mysqli_error($conn));

}
include_once('select_product.php');
?>