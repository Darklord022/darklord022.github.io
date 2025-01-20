<?php
// Connect to the SQLite3 database
$db = new SQLite3('db/ComputerParts.db');


// Now attempt to query the Products table
$query = 'SELECT * FROM Products';
$result = $db->query($query);

// Check if the query was successful
if ($result) {
    // Fetch and display results
    echo "<h1>Product List</h1>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Name</th><th>Category</th><th>Price</th><th>Stock</th></tr>";

    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['Id'] . "</td>";
        echo "<td>" . $row['Name'] . "</td>";
        echo "<td>" . $row['Category'] . "</td>";
        echo "<td>" . $row['Price'] . "</td>";
        echo "<td>" . $row['Stock'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Error: Could not execute query.";
}
?>