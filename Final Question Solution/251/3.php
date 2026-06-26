<?php

// ------------------------------------------------------
// DATABASE CONNECTION
// ------------------------------------------------------

// Name of the database server.
// "localhost" means MySQL is running on your own computer.
$servername = "localhost";

// Default username of XAMPP MySQL.
$username = "root";

// Default password.
// In XAMPP, it is usually empty.
$password = "";

// Name of the database that we want to use.
$dbname = "uiutech_final";


// ------------------------------------------------------
// CONNECT TO MYSQL DATABASE
// ------------------------------------------------------

// Create a new MySQL connection.
//
// Syntax:
// new mysqli(servername, username, password, databaseName)
//
// The connection object is stored inside $conn.
$conn = new mysqli($servername, $username, $password, $dbname);


// ------------------------------------------------------
// CHECK IF CONNECTION IS SUCCESSFUL
// ------------------------------------------------------

// connect_error becomes true if the database
// connection fails.
//
// If connection fails,
// die() immediately stops the program
// and prints the error message.
//
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// ======================================================
// QUESTION 1
// Count employees according to Performance Rating
// ======================================================

echo "<h3>1. Employee Count by Performance Rating</h3>";


// SQL Query:
//
// SELECT
// Choose these columns.
//
// PerformanceRating
// COUNT(*) counts how many rows belong to each rating.
//
// AS Total
// Gives the count column a new name.
//
// GROUP BY
// Groups employees having the same rating.
//
$sql = "SELECT PerformanceRating,
               COUNT(*) AS Total
        FROM employee_final
        GROUP BY PerformanceRating";


// Send SQL query to MySQL.
$result = $conn->query($sql);


// fetch_assoc()
// Reads one row at a time.
//
// The loop continues until no rows remain.
//
while ($row = $result->fetch_assoc()) {

    // Display result.

    echo "Rating " .
         $row["PerformanceRating"] .
         " : " .
         $row["Total"] .
         " employee(s)<br>";
}



// ======================================================
// QUESTION 2
// Change Performance Rating
// ======================================================

// UPDATE changes existing data.
//
// SET specifies the new value.
//
// WHERE tells MySQL which rows to update.
//
// Conditions:
//
// Salary must be below 40,000
//
// AND
//
// Rating must NOT be D.
//
// <> means "Not Equal To"
//
$sql = "UPDATE employee_final
        SET PerformanceRating = 'C'
        WHERE Salary < 40000
        AND PerformanceRating <> 'D'";


// Execute update query.
$conn->query($sql);


// Display success message.
echo "<br>Performance ratings updated successfully.<br>";




// ======================================================
// QUESTION 3
// Give Bonus
// ======================================================

// Increase salary by 5000.
//
// BUT ONLY IF:
//
// Salary > 50000
//
// AND
//
// Final salary after bonus
// does not exceed 60000.
//
$sql = "UPDATE employee_final
        SET Salary = Salary + 5000
        WHERE Salary > 50000
        AND (Salary + 5000) <= 60000";


// Execute query.
$conn->query($sql);


// Success message.
echo "Salary bonus applied successfully.<br>";




// ======================================================
// QUESTION 4
// Count Employees Department Wise
// ======================================================

echo "<h3>4. Employees by Department</h3>";


// SQL Explanation:
//
// SELECT DepartmentName
//
// COUNT(*) counts employees.
//
// GROUP BY
// Groups employees according to department.
//
// ORDER BY DESC
// Shows department with highest employee count first.
//
$sql = "SELECT DepartmentName,
               COUNT(*) AS TotalEmployees
        FROM employee_final
        GROUP BY DepartmentName
        ORDER BY TotalEmployees DESC";


// Execute query.
$result = $conn->query($sql);


// Read every row.
while ($row = $result->fetch_assoc()) {

    echo $row["DepartmentName"] .
         " : " .
         $row["TotalEmployees"] .
         " employee(s)<br>";
}



// ------------------------------------------------------
// CLOSE DATABASE CONNECTION
// ------------------------------------------------------

// Always close the connection after finishing.
$conn->close();

?>