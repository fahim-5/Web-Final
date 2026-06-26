<?php

// ------------------------------------------------------
// DATABASE CONNECTION
// ------------------------------------------------------

// MySQL server name.
// "localhost" means MySQL is running on this computer.
$servername = "localhost";

// MySQL username.
$username = "root";

// MySQL password.
// XAMPP uses an empty password by default.
$password = "";

// Database name that we want to connect to.
$dbname = "sundarban";


// ------------------------------------------------------
// CONNECT TO MYSQL DATABASE
// ------------------------------------------------------

// Create a new MySQL connection.
//
// Syntax:
// new mysqli(server, username, password, database)
//
$conn = new mysqli($servername, $username, $password, $dbname);


// ------------------------------------------------------
// CHECK DATABASE CONNECTION
// ------------------------------------------------------

// If the connection fails,
// stop the program and display the error.
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// ======================================================
// QUESTION 1
// Display Total Revenue Per Category
// ======================================================

echo "<h3>Total Revenue Per Category</h3>";

// SQL Query:
//
// SELECT CategoryName
// Select the category name.
//
// SUM(Revenue)
// Adds all revenue values of the same category.
//
// AS TotalRevenue
// Gives the calculated column a temporary name.
//
// GROUP BY CategoryName
// Groups all products of the same category together.
//
$sql = "SELECT CategoryName,
               SUM(Revenue) AS TotalRevenue
        FROM sales_data
        GROUP BY CategoryName";

// Execute the SQL query.
$result = $conn->query($sql);

// Read one row at a time.
while ($row = $result->fetch_assoc()) {

    // Display category name and total revenue.
    echo $row["CategoryName"] .
         " : " .
         $row["TotalRevenue"] .
         " BDT<br>";
}



// ======================================================
// QUESTION 2
// Update Low Performing Categories
// ======================================================

// UPDATE modifies existing records.
//
// SET changes the value.
//
// WHERE selects only those rows
// where Revenue is below 40,000.
//
$sql = "UPDATE sales_data
        SET CategoryName = 'Low Performing'
        WHERE Revenue < 40000";

// Execute the update query.
$conn->query($sql);

// Display success message.
echo "<br>Low-performing products updated.<br>";



// ======================================================
// QUESTION 3
// Increase Revenue by 10%
// ======================================================

// Give a 10% bonus to products
// whose revenue is greater than 70,000.
//
// Formula:
//
// Revenue = Revenue + (Revenue × 10%)
//
$sql = "UPDATE sales_data
        SET Revenue = Revenue + (Revenue * 0.10)
        WHERE Revenue > 70000";

// Execute the query.
$conn->query($sql);

// Display success message.
echo "Bonus revenue applied.<br>";



// ======================================================
// QUESTION 4
// Display Product Status
// ======================================================

echo "<h3>Product Status</h3>";

// This query uses CASE.
//
// CASE works like IF-ELSE.
//
// If a product's revenue is greater
// than the average revenue of its category,
// label it "Top Seller".
//
// Otherwise,
// label it "Regular Seller".
//
$sql = "
SELECT

    s.ProductName,

    s.CategoryName,

    s.Revenue,

    CASE

        WHEN s.Revenue >

            (
                SELECT AVG(Revenue)

                FROM sales_data

                WHERE CategoryName = s.CategoryName
            )

        THEN 'Top Seller'

        ELSE 'Regular Seller'

    END AS SellerLabel

FROM sales_data s;
";

// Execute query.
$result = $conn->query($sql);

// Read every row.
while ($row = $result->fetch_assoc()) {

    echo $row["ProductName"] .
         " - " .
         $row["CategoryName"] .
         " - " .
         $row["SellerLabel"] .
         "<br>";
}



// ------------------------------------------------------
// CLOSE DATABASE CONNECTION
// ------------------------------------------------------

// Close the MySQL connection.
$conn->close();

?>