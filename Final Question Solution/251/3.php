
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uiutech_final";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/* 1. Total employees by performance rating */
echo "<h3>1. Employee Count by Performance Rating</h3>";

$sql = "SELECT PerformanceRating, COUNT(*) AS Total
        FROM employee_final
        GROUP BY PerformanceRating";

$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo "Rating " . $row["PerformanceRating"] .
         " : " . $row["Total"] . " employee(s)<br>";
}

/* 2. Update rating to C if salary < 40000 and rating is not D */
$sql = "UPDATE employee_final
        SET PerformanceRating = 'C'
        WHERE Salary < 40000
        AND PerformanceRating <> 'D'";

$conn->query($sql);

echo "<br>Performance ratings updated successfully.<br>";

/* 3. Add 5000 bonus if salary > 50000
      and final salary <= 60000 */
$sql = "UPDATE employee_final
        SET Salary = Salary + 5000
        WHERE Salary > 50000
        AND (Salary + 5000) <= 60000";

$conn->query($sql);

echo "Salary bonus applied successfully.<br>";

/* 4. Department-wise employee count */
echo "<h3>4. Employees by Department</h3>";

$sql = "SELECT DepartmentName,
               COUNT(*) AS TotalEmployees
        FROM employee_final
        GROUP BY DepartmentName
        ORDER BY TotalEmployees DESC";

$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo $row["DepartmentName"] . " : " .
         $row["TotalEmployees"] . " employee(s)<br>";
}

$conn->close();
?>

