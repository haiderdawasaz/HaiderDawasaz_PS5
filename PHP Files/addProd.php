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

if (isset($_POST['name'], $_POST['quantity'], $_POST['price'])) {
    // Retrieve data from the HTML form
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    // Prepare an SQL INSERT statement
    $sql = "INSERT INTO products (id, product_name, quantity, price) VALUES (NULL, ?, ?, ?)";

    // Create a prepared statement
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Error in preparing the SQL statement: " . $conn->error);
    }

    // Bind parameters and execute the statement
    $stmt->bind_param("sss", $name, $quantity, $price);

    if ($stmt->execute()) {
        // Data inserted successfully into the database
        // Redirect back to the HTML page
        header('Location: ../views/index.html');
        exit();
    } else {
        echo "Error inserting data: " . $stmt->error;
    }

    // Close the prepared statement and the database connection
    $stmt->close();
    $conn->close();
}
?>