
<?php

$attendees = $_POST["attendees"];
$capacity = $_POST["capacity"];
$ticketPrice = $_POST["ticketPrice"];

// Calculate total screens needed
$totalScreens = ceil($attendees / $capacity);

// Calculate empty seats
$emptySeats = ($totalScreens * $capacity) - $attendees;

// Calculate wasted money
$wastedMoney = $emptySeats * $ticketPrice;

// Display results
echo "<h2>Calculation Result</h2>";
echo "Total Screens: " . $totalScreens . "<br>";
echo "Empty Seats: " . $emptySeats . "<br>";
echo "Wasted Money: " . $wastedMoney . " BDT";

?>

