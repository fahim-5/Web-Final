<?php

// ----------------------------------------------------
// Receive Data from HTML Form
// ----------------------------------------------------

// Get total attendees entered by the user.
$attendees = $_POST["attendees"];

// Get seat capacity of one screen.
$capacity = $_POST["capacity"];

// Get ticket price.
$ticketPrice = $_POST["ticketPrice"];



// ----------------------------------------------------
// Calculate Total Screens Needed
// ----------------------------------------------------

// Formula:
//
// Total Screens = Total Attendees ÷ Capacity
//
// ceil() always rounds UP.
//
// Example:
//
// Attendees = 450
//
// Capacity = 200
//
// 450 / 200 = 2.25
//
// ceil(2.25) = 3
//
// Therefore,
// 3 screens are needed.
//
$totalScreens = ceil($attendees / $capacity);



// ----------------------------------------------------
// Calculate Empty Seats
// ----------------------------------------------------

// First calculate total available seats.
//
// Example:
//
// 3 screens × 200 seats
// = 600 seats
//
// Empty seats
//
// = Total Seats - Total Attendees
//
// = 600 - 450
//
// = 150
//
$emptySeats = ($totalScreens * $capacity) - $attendees;



// ----------------------------------------------------
// Calculate Wasted Money
// ----------------------------------------------------

// Every empty seat means
// one ticket could not be sold.
//
// Formula:
//
// Empty Seats × Ticket Price
//
// Example:
//
// 150 × 350
//
// = 52,500 BDT
//
$wastedMoney = $emptySeats * $ticketPrice;



// ----------------------------------------------------
// Display Results
// ----------------------------------------------------

// Print heading.
echo "<h2>Calculation Result</h2>";

// Show total screens required.
echo "Total Screens: " . $totalScreens . "<br>";

// Show empty seats.
echo "Empty Seats: " . $emptySeats . "<br>";

// Show money lost because of empty seats.
echo "Wasted Money: " . $wastedMoney . " BDT";

?>