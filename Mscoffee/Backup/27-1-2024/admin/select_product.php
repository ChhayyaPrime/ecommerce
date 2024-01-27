<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>select_product</title>
</head>
<body>
    
        <table border=1>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Picture</th>
                <th>Size</th>
                <th>Price</th>
                <th>Point</th>
                <th>Action</th>
            </tr>
        
        <?php
            include_once('../config.php');
            $query="SELECT * FROM `tblproduct`";
            $result=mysqli_query($conn,$query);
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_array($result)){
                    echo"<tr>";
                    echo"<td>".$row['pro_id'];
                    echo"<td>".$row['name'];
                 ?>
                <td>
                    <img src="../images/<?php echo $row['img'];?>" width="100">
                </td>
                    <?php
                    echo"<td>".$row['size']."</td>";
                    echo"<td>".$row['price']."</td>";
                    echo"<td>".$row['point']."</td>";

                    // still not working yet

                    echo"<td>".$row['action'];
                    //this
                    ?>
                
                        <a href="edit_product.php?ProID=<?php echo $row['pro_id'];?>">Edit</a>
                        <a href="delete_ptoduct.php?ProID=<?php echo $row['pro_id'];?>">Delete</a>
                    </td>

                    <?php
                    echo"</tr>";
                
                }
            }

        ?>
  
        </table>
</body>
</html>