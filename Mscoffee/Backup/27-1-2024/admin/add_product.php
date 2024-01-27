<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add_product</title>
</head>
<body>
    <form action="added_product.php" method="post" enctype="multipart/form-data">
        Name:<input type="text" name="txtname" value=""><br><br>
        Photo:<input type="file" name="file" /><br><br>
        Size:<select name="txtsize">
            <option value="Large">Large</option>
            <option value="Medium">Medium</option>
            <option value="Small">Small</option>
        </select><br><br>
        Price:<input type="text" name="txtprice" value="">$<br>
        Point:<input type="text" name="txtpoint" value=""><br><br>

        <input type="submit" value="Add Menu" name="btnadd">
    </form>
    
</body>
</html>