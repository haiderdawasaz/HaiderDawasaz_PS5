<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Get the form data, including the product ID
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    // Prepare an SQL UPDATE statement to update product details
    $sql = "UPDATE products SET product_name = ?, quantity = ?, price = ? WHERE id = ?";

    // Create a prepared statement
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Error in preparing the SQL statement: " . $conn->error);
    }

    // Bind the parameters and execute the statement
    $stmt->bind_param("sddi", $product_name, $quantity, $price, $product_id);

    if ($stmt->execute()) {
        header('Location: ../views/index.html');
        exit();
    } else {
        echo "Error updating product: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();

    // Close the database connection
    $conn->close();
} else {
    // If the form was not submitted via POST, display an error message
    echo "Invalid request.";
}
?>
