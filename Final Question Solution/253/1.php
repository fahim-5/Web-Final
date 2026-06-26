<?php

// ------------------------------------------------------
// RECEIVE DATA FROM HTML FORM
// ------------------------------------------------------

// Get CT 1 marks.
$ct1 = $_POST['ct1'];

// Get CT 2 marks.
$ct2 = $_POST['ct2'];

// Get CT 3 marks.
$ct3 = $_POST['ct3'];

// Get Midterm marks.
$midterm = $_POST['midterm'];

// Get Final exam marks.
$final = $_POST['final'];



// ------------------------------------------------------
// STORE CT MARKS IN AN ARRAY
// ------------------------------------------------------

// Create an array containing all
// three class test marks.
//
// Example:
//
// CT1 = 18
// CT2 = 15
// CT3 = 20
//
// Array:
//
// [18,15,20]
//
$cts = array($ct1, $ct2, $ct3);



// ------------------------------------------------------
// SORT ARRAY IN DESCENDING ORDER
// ------------------------------------------------------

// rsort() sorts the array
// from highest to lowest.
//
// Example:
//
// Before:
//
// [18,15,20]
//
// After:
//
// [20,18,15]
//
rsort($cts);



// ------------------------------------------------------
// CALCULATE BEST TWO CT TOTAL
// ------------------------------------------------------

// Since the array is sorted,
// index 0 contains the highest mark
// and index 1 contains the second highest.
//
// Add these two marks.
//
$bestTwoTotal = $cts[0] + $cts[1];



// ------------------------------------------------------
// CALCULATE CT AVERAGE
// ------------------------------------------------------

// Average = Total ÷ 2
//
// Example:
//
// 20 + 18 = 38
//
// 38 ÷ 2 = 19
//
$ctAverage = $bestTwoTotal / 2;



// ------------------------------------------------------
// CALCULATE TOTAL MARKS
// ------------------------------------------------------

// Formula:
//
// CT Average
// + Midterm
// + Final
//
$totalMarks = $ctAverage + $midterm + $final;



// ------------------------------------------------------
// DETERMINE PASS OR FAIL
// ------------------------------------------------------

// Ternary Operator
//
// Syntax:
//
// (condition) ? value_if_true : value_if_false;
//
// If Total Marks > 54
// Status = Passed
//
// Otherwise
// Status = Failed
//
$status = ($totalMarks > 54)
            ? "Passed"
            : "Failed";



// ------------------------------------------------------
// DISPLAY RESULTS
// ------------------------------------------------------

// Display heading.
echo "<h3>Result</h3>";

// Display best two CT total.
echo "Best two CT's total: "
     . $bestTwoTotal
     . "<br>";

// Display Midterm marks.
echo "Midterm marks: "
     . $midterm
     . "<br>";

// Display Final marks.
echo "Final marks: "
     . $final
     . "<br><br>";

// Display Total Marks.
echo "<b>Total Marks = "
     . $totalMarks
     . "</b><br>";

// Display Pass/Fail status.
echo "Status: "
     . $status;

?>