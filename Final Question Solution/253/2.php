<?php

// ------------------------------------------------------
// RECEIVE DATA FROM HTML FORM
// ------------------------------------------------------

// Get items sold per day.
$itemsPerDay = $_POST["itemsPerDay"];

// Get total number of days.
$days = $_POST["days"];

// Get target number of items.
$target = $_POST["target"];



// ------------------------------------------------------
// CALCULATE TOTAL ITEMS SOLD
// ------------------------------------------------------

// Formula:
//
// Total Items = Items Per Day × Days
//
// Example:
//
// 100 × 5 = 500
//
$totalItems = $itemsPerDay * $days;



// ======================================================
// DETERMINE PERFORMANCE
// ======================================================

// Check the total items sold
// and assign a performance level.

if ($totalItems >= 500) {

    // 500 or more items sold.
    $performance = "Excellent";

}
elseif ($totalItems >= 300) {

    // Between 300 and 499.
    $performance = "Good";

}
elseif ($totalItems >= 150) {

    // Between 150 and 299.
    $performance = "Average";

}
else {

    // Less than 150.
    $performance = "Poor";

}



// ======================================================
// COMPARE TOTAL ITEMS WITH TARGET
// ======================================================

// If total items are greater
// than the target.
if ($totalItems > $target) {

    // Calculate how many items
    // exceeded the target.
    $result = "Above target by "
            . ($totalItems - $target)
            . " items";
}

// If total items are less
// than the target.
elseif ($totalItems < $target) {

    // Calculate how many items
    // are below the target.
    $result = "Below target by "
            . ($target - $totalItems)
            . " items";
}

// If total items are exactly equal
// to the target.
else {

    $result = "Target met exactly (0 difference)";
}



// ------------------------------------------------------
// DISPLAY RESULTS
// ------------------------------------------------------

// Display heading.
echo "<h2>Result</h2>";

// Display total items sold.
echo "Total Items Sold: " . $totalItems . "<br>";

// Display performance level.
echo "Performance: " . $performance . "<br>";

// Display target.
echo "Target: " . $target . "<br>";

// Display comparison result.
echo "Result: " . $result;

?>