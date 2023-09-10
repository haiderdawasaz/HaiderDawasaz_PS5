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

// Prepare an SQL SELECT statement
$sql = "SELECT product_name, quantity, price FROM products";

// Execute the SQL query
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data in a table format
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["product_name"] . "</td>";
        echo "<td>" . $row["quantity"] . "</td>";
        echo "<td>" . $row["price"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "No data found.";
}

// Close the database connection
$conn->close();
?>
