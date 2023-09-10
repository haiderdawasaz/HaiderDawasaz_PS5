<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "product_management_system";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assume you have a product ID, which you can use to fetch product details
$product_id = $_GET['id']; // Replace with the actual product ID

// Prepare an SQL SELECT statement
$sql = "SELECT product_name, quantity, price FROM products WHERE id = ?";

// Create a prepared statement
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Error in preparing the SQL statement: " . $conn->error);
}

// Bind the product ID parameter and execute the statement
$stmt->bind_param("i", $product_id);

if ($stmt->execute()) {
    // Bind the result variables
    $stmt->bind_result($product_name, $quantity, $price);

    // Fetch the product details
    $stmt->fetch();

    // Close the prepared statement
    $stmt->close();
} else {
    echo "Error fetching data: " . $stmt->error;
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Details</title>
    <link rel="stylesheet" href="../CSS Files/index.css">
    <link rel="stylesheet" href="../CSS Files/update.css">
</head>
<body>
    <form action="update_product.php" method="post">
        <label for="product_name">Product Name:</label>
        <input type="text" name="product_name" id="product_name" value="<?php echo $product_name; ?>"><br>
        
        <label for="quantity">Quantity:</label>
        <input type="text" name="quantity" id="quantity" value="<?php echo $quantity; ?>"><br>
        
        <label for="price">Price:</label>
        <input type="text" name="price" id="price" value="<?php echo $price; ?>"><br>

        <input type="submit" value="Update">
    </form>
</body>
</html>
