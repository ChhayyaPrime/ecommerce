<?php
include_once('../config.php');
$ID=isset($_REQUEST['ProID'])?$_REQUEST['ProID']:'';

$folder="../images/";
$name1=isset($_POST['txtname'])? $_POST['txtname']:'';
$img1=isset($_FILES['files']['name'])? $_FILES['files']['name']:'';
$size1=isset($_POST['txtsize'])? $_POST['txtsize']:'';
$price1=isset($_POST['txtprice'])? $_POST['txtprice']:'';
$point1=isset($_POST['txtpoint'])? $_POST['txtpoint']:'';

// $folder = "../images";
// $name = isset($_POST['txtname']) ? $_POST['txtname'] : '';
// $menu = isset($_POST['txtmenu']) ? $_POST['txtmenu'] : '';
// $size = isset($_POST['txtsize']) ? $_POST['txtsize'] : '';
// $price = isset($_POST['txtprice']) ? $_POST['txtprice'] : '';
// $point = isset($_POST['txtpoint']) ? $_POST['txtpoint'] : '';

move_uploaded_file($_FILES['files']['tmp_name'],$folder.$img1);
$query="UPDATE `tblproduct` SET `name`='$name1',`img`='$img1',`size`='$size1',
`price`='$price1',`point`='$point1'
WHERE `pro_id`='$ID'";

$result=mysqli_query($conn,$query);
if(!$result){
    echo"Can not update".mysqli_error($conn);
}
include_once('select_product.php');
?>