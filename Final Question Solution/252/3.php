
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sundarban";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/* 1. Display total revenue per category */
echo "<h3>Total Revenue Per Category</h3>";

$sql = "SELECT CategoryName, SUM(Revenue) AS TotalRevenue
        FROM sales_data
        GROUP BY CategoryName";

$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo $row["CategoryName"] . " : " . $row["TotalRevenue"] . " BDT<br>";
}

/* 2. Update category to 'Low Performing'
      if revenue is below 40000 */
$sql = "UPDATE sales_data
        SET CategoryName = 'Low Performing'
        WHERE Revenue < 40000";

$conn->query($sql);

echo "<br>Low-performing products updated.<br>";

/* 3. Add 10% bonus revenue
      for products with revenue > 70000 */
$sql = "UPDATE sales_data
        SET Revenue = Revenue + (Revenue * 0.10)
        WHERE Revenue > 70000";

$conn->query($sql);

echo "Bonus revenue applied.<br>";

/* 4. Display seller label */
echo "<h3>Product Status</h3>";

$sql = "
SELECT
    s.ProductName,
    s.CategoryName,
    s.Revenue,
    CASE
        WHEN s.Revenue >
            (SELECT AVG(Revenue)
             FROM sales_data
             WHERE CategoryName = s.CategoryName)
        THEN 'Top Seller'
        ELSE 'Regular Seller'
    END AS SellerLabel
FROM sales_data s;
";

$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo $row["ProductName"] . " - "
         . $row["CategoryName"] . " - "
         . $row["SellerLabel"] . "<br>";
}

$conn->close();
?>

