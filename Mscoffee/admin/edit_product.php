<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select_product</title>
</head>
<?php
    include_once('../config.php');
        $ID=isset($_REQUEST['ProID'])?$_REQUEST['ProID']:'';

        $query="SELECT * FROM `tblproduct` WHERE `pro_id`='$ID'";
        $result=mysqli_query($conn,$query);
        $row=mysqli_fetch_array($result);
    ?>
    <?php
    if(isset($_POST['btndelete'])){
        include_once('delete_ptoduct.php');
    }
    else if(isset($_POST['btnupdate'])){
        include_once('update_product.php');
    }
    else{
        
    ?>
<body>
    <form action="<?php $_PHP_SELF;?>" method="post" enctype="multipart/form-data">

        Name:
        <input type="text" name="txtname" value="<?php echo $row['name'];?>"><br>

        Photo:<input type="file" name="files"><img src="../images/<?php echo $row['img'];?>"><br><br>

        Size:<select name="txtsize" <?php echo $row['size'];?>>
            <option value="Large">Large</option>
            <option value="Medium">Medium</option>
            <option value="Small">Small</option>
        </select><br><br>

        Price:<input type="text" name="txtprice" value="<?php echo $row['price'];?>">$<br>

        Point:<input type="text" name="txtpoint" value="<?php echo $row['point'];?>"><br><br>

        <input type="submit" value="delete" name="btndelete">
        <input type="submit" value="update" name="btnupdate">
    </form>
    <?php
    }
    ?>
    
   
</body>
</html>