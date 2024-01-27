<?php

$server="localhost";
$user="root";
$password="";
$db="db_coffee";


$conn=mysqli_connect($server,$user,$password);
$sql=mysqli_select_db($conn,$db);

if(!$conn){
    echo"can't connect".mysqli_error($conn);
}
else{
    echo"sucess connect";
}


?>