<?php

// ------------------------------------------------------
// CONNECT TO MYSQL DATABASE
// ------------------------------------------------------

// Create a connection to the MySQL database.
//
// Parameters:
// localhost → MySQL server
// root      → Username
// ""        → Password (empty in XAMPP)
// campus_library → Database name
//
$conn = new mysqli("localhost", "root", "", "campus_library");


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
// Count Books by Status
// ======================================================

echo "<h3>Status Count</h3>";

// SQL Query:
//
// SELECT Status
// Select the Status column.
//
// COUNT(*)
// Counts how many books belong
// to each status.
//
// AS Total
// Gives the count column
// the temporary name "Total".
//
// GROUP BY Status
// Groups books having the same status.
//
// HAVING COUNT(*) > 1
// Display only groups
// where the count is greater than 1.
//
// Difference:
//
// WHERE filters rows BEFORE grouping.
//
// HAVING filters groups AFTER grouping.
//
$sql = "SELECT Status,
               COUNT(*) AS Total
        FROM book_loans
        GROUP BY Status
        HAVING COUNT(*) > 1";

// Execute SQL query.
$result = $conn->query($sql);

// Read one row at a time.
while ($row = $result->fetch_assoc()) {

    echo $row["Status"] .
         " : " .
         $row["Total"] .
         "<br>";
}



// ======================================================
// QUESTION 2
// Update Grace Period
// ======================================================

// UPDATE changes existing records.
//
// SET changes the values.
//
// If
// Status = Overdue
//
// AND
// DaysOverdue is less than 7
//
// Then
// Change status to Grace Period
// and remove penalty by setting
// PenaltyFee = 0.
//
$conn->query("

    UPDATE book_loans

    SET Status='Grace Period',
        PenaltyFee=0

    WHERE Status='Overdue'

    AND DaysOverdue < 7

");



// ======================================================
// QUESTION 3
// Increase Penalty Fee by 10%
// ======================================================

// Increase penalty fee by 10%
//
// BUT ONLY IF
//
// PenaltyFee > 20
//
// AND
//
// Final fee after adding 10%
// is less than or equal to 50.
//
// Formula:
//
// PenaltyFee = PenaltyFee × 1.10
//
$conn->query("

    UPDATE book_loans

    SET PenaltyFee = PenaltyFee * 1.10

    WHERE PenaltyFee > 20

    AND (PenaltyFee * 1.10) <= 50

");



// ======================================================
// QUESTION 4
// Total Penalty by Book
// ======================================================

echo "<h3>Penalty by Book</h3>";

// SQL Query:
//
// SELECT BookTitle
// Select book title.
//
// SUM(PenaltyFee)
// Add all penalty fees
// for the same book.
//
// AS TotalPenalty
// Temporary column name.
//
// GROUP BY BookTitle
// Combine same book titles.
//
// ORDER BY DESC
// Show highest penalty first.
//
$sql = "SELECT BookTitle,

               SUM(PenaltyFee) AS TotalPenalty

        FROM book_loans

        GROUP BY BookTitle

        ORDER BY TotalPenalty DESC";

// Execute query.
$result = $conn->query($sql);

// Read every row.
while ($row = $result->fetch_assoc()) {

    echo $row["BookTitle"] .
         " : " .
         $row["TotalPenalty"] .
         "<br>";
}



// ------------------------------------------------------
// CLOSE DATABASE CONNECTION
// ------------------------------------------------------

// Close the MySQL connection.
$conn->close();

?>