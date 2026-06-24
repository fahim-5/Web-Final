<?php

$ct1 = $_POST['ct1'];
$ct2 = $_POST['ct2'];
$ct3 = $_POST['ct3'];
$midterm = $_POST['midterm'];
$final = $_POST['final'];

$cts = array($ct1, $ct2, $ct3);

rsort($cts); // highest to lowest

$bestTwoTotal = $cts[0] + $cts[1];
$ctAverage = $bestTwoTotal / 2;

$totalMarks = $ctAverage + $midterm + $final;

$status = ($totalMarks > 54) ? "Passed" : "Failed";

echo "<h3>Result</h3>";
echo "Best two CT's total: " . $bestTwoTotal . "<br>";
echo "Midterm marks: " . $midterm . "<br>";
echo "Final marks: " . $final . "<br><br>";

echo "<b>Total Marks = " . $totalMarks . "</b><br>";
echo "Status: " . $status;

?>