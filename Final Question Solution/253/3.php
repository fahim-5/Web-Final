<?php

$conn = new mysqli("localhost", "root", "", "campus_library");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 1. Count books by status (only count > 1)
echo "<h3>Status Count</h3>";

$sql = "SELECT Status, COUNT(*) AS Total
        FROM book_loans
        GROUP BY Status
        HAVING COUNT(*) > 1";

$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo $row["Status"] . " : " . $row["Total"] . "<br>";
}

// 2. Update Grace Period
$conn->query("
    UPDATE book_loans
    SET Status='Grace Period', PenaltyFee=0
    WHERE Status='Overdue' AND DaysOverdue < 7
");

// 3. Increase fee by 10% if final fee <= 50
$conn->query("
    UPDATE book_loans
    SET PenaltyFee = PenaltyFee * 1.10
    WHERE PenaltyFee > 20
    AND (PenaltyFee * 1.10) <= 50
");

// 4. Total penalty by book title
echo "<h3>Penalty by Book</h3>";

$sql = "SELECT BookTitle,
               SUM(PenaltyFee) AS TotalPenalty
        FROM book_loans
        GROUP BY BookTitle
        ORDER BY TotalPenalty DESC";

$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo $row["BookTitle"] . " : " . $row["TotalPenalty"] . "<br>";
}

$conn->close();

?>