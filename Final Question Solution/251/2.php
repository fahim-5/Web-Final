### `calculate.php`

```php
<?php

$attendees = $_POST["attendees"];
$costPerPerson = $_POST["costPerPerson"];
$capacity = $_POST["capacity"];

// Calculate total venues needed
$totalVenues = ceil($attendees / $capacity);

// Calculate empty seats
$emptySeats = ($totalVenues * $capacity) - $attendees;

// Calculate wasted money
$wastedMoney = $emptySeats * $costPerPerson;

// Display results
echo "<h2>Calculation Result</h2>";
echo "Total Venues Needed: " . $totalVenues . "<br>";
echo "Empty Seats: " . $emptySeats . "<br>";
echo "Wasted Money (BDT): " . $wastedMoney;

?>
```
