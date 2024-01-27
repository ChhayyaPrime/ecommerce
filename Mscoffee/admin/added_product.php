<?php
include_once('../config.php');

$folder = "../images";
$name = isset($_POST['txtname']) ? $_POST['txtname'] : '';
$menu = isset($_POST['txtmenu']) ? $_POST['txtmenu'] : '';
$size = isset($_POST['txtsize']) ? $_POST['txtsize'] : '';
$price = isset($_POST['txtprice']) ? $_POST['txtprice'] : '';
$point = isset($_POST['txtpoint']) ? $_POST['txtpoint'] : '';

// Debug - Display input values
echo "Debug - Input Values: Name=$name, Size=$size, Price=$price, Point=$point<br>";

// Check if the 'file' key is present in the $_FILES array
if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
    $img = $_FILES['file']['name'];  // Use the 'file' key
    $temp_file = $_FILES['file']['tmp_name'];

    // Debug - Display file information
    echo "Debug - File Info: Name=$img, Temp File=$temp_file<br>";

    // Move the uploaded file to the destination folder
    if (move_uploaded_file($temp_file, $folder . '/' . $img)) {
        echo "Debug - File moved successfully<br>";
    } else {
        echo "Debug - File move failed<br>";
        echo "File upload failed. Check if a file was selected.";
        exit();
    }
} else {
    // Handle the case where the file upload failed
    echo "Debug - File key not present in \$_FILES or upload error occurred<br>";
    echo "File upload failed. Check if a file was selected.";
    exit();
}

// Use prepared statements to prevent SQL injection
$query = "INSERT INTO `tblproduct`(`name`, `img`, `size`, `price`, `point`)
        VALUES (?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $query);

// Bind parameters
mysqli_stmt_bind_param($stmt, 'sssss', $name, $img, $size, $price, $point);

// Execute statement
$result = mysqli_stmt_execute($stmt);

// Check the result of the database operation
if (!$result) {
    echo "Can't Insert: " . mysqli_error($conn);
} else {
    echo "Successfully";
}

// Close statement and connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
