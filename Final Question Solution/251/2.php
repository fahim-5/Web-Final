<?php

// -----------------------------------------
// Receiving Data from the HTML Form
// -----------------------------------------

// Get the number of attendees entered by the user.
$attendees = $_POST["attendees"];

// Get the cost per person.
$costPerPerson = $_POST["costPerPerson"];

// Get the maximum capacity of one venue.
$capacity = $_POST["capacity"];



// -----------------------------------------
// Calculate Total Venues Needed
// -----------------------------------------

// Formula:
// Total Venues = Total Attendees ÷ Capacity
//
// ceil() rounds the result UP.
//
// Example:
// 450 attendees
// Capacity = 200
//
// 450 / 200 = 2.25
//
// ceil(2.25) = 3
//
// Therefore,
// 3 venues are needed.
//
$totalVenues = ceil($attendees / $capacity);



// -----------------------------------------
// Calculate Empty Seats
// -----------------------------------------

// First calculate total available seats.
//
// Example:
// 3 venues × 200 seats = 600 seats
//
// Empty seats =
// Total available seats - Total attendees
//
// 600 - 450 = 150 empty seats
//
$emptySeats = ($totalVenues * $capacity) - $attendees;



// -----------------------------------------
// Calculate Wasted Money
// -----------------------------------------

// Every empty seat represents money spent
// without anyone using it.
//
// Formula:
//
// Empty Seats × Cost Per Person
//
// Example:
// 150 × 500
// = 75,000 BDT
//
$wastedMoney = $emptySeats * $costPerPerson;



// -----------------------------------------
// Display Results
// -----------------------------------------

// Print a heading.
echo "<h2>Calculation Result</h2>";

// Display total venues.
echo "Total Venues Needed: " . $totalVenues . "<br>";

// Display empty seats.
echo "Empty Seats: " . $emptySeats . "<br>";

// Display wasted money.
echo "Wasted Money (BDT): " . $wastedMoney;

?>