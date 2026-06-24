<?php

$itemsPerDay = $_POST["itemsPerDay"];
$days = $_POST["days"];
$target = $_POST["target"];

$totalItems = $itemsPerDay * $days;

// Performance
if ($totalItems >= 500) {
    $performance = "Excellent";
} elseif ($totalItems >= 300) {
    $performance = "Good";
} elseif ($totalItems >= 150) {
    $performance = "Average";
} else {
    $performance = "Poor";
}

// Compare with target
if ($totalItems > $target) {
    $result = "Above target by " . ($totalItems - $target) . " items";
} elseif ($totalItems < $target) {
    $result = "Below target by " . ($target - $totalItems) . " items";
} else {
    $result = "Target met exactly (0 difference)";
}

echo "<h2>Result</h2>";
echo "Total Items Sold: " . $totalItems . "<br>";
echo "Performance: " . $performance . "<br>";
echo "Target: " . $target . "<br>";
echo "Result: " . $result;

?>