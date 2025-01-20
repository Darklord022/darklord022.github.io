<?php
// Connect to the SQLite3 database
$db = new SQLite3('c:\Users\User\Desktop\Medusa project/ComputerParts');

// Get form data (e.g., from a POST request)
$name = $_POST['name'];
$category = $_POST['category'];
$price = $_POST['price'];
$stock = $_POST['stock'];

// Prepare and execute the SQL query
$query = "INSERT INTO Products (name, category, price, stock) VALUES ('$name', '$category', $price, $stock)";
if ($db->exec($query)) {
    echo "Product added successfully!";
} else {
    echo "Error adding product.";
}
?>