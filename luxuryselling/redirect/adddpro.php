<?php
// Retrieve form data
$title = $_POST['title'];
$description = $_POST['description'];
$price = $_POST['price'];

// Perform any necessary server-side validation

// Image upload
$targetDir = "uploads/";  // Specify the directory to store the uploaded images
$targetFile = $targetDir . basename($_FILES["image"]["name"]);
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
$check = getimagesize($_FILES["image"]["tmp_name"]);
if ($check !== false) {
    // Move the uploaded file to the specified directory
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        echo "The file ". basename($_FILES["image"]["name"]). " has been uploaded.";

        // Connect to the database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "products";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Insert the product into the database
        $sql = "INSERT INTO products (title, description, price, image) VALUES ('$title', '$description', $price, '$targetFile')";

        if ($conn->query($sql) === TRUE) {
            echo "Product added successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
} else {
    echo "File is not an image.";
}
?>
