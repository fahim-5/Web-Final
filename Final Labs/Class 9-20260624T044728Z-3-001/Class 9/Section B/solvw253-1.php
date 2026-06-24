<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $cts = [$_POST["ct1"], $_POST["ct2"], $_POST["ct3"]];
        $mid = $_POST["mid"];
        $final = $_POST["final"];

        sort($cts);

        $besttwo = $cts[1] + $cts[2];

        $avg = $besttwo / 2;

        $total = $avg + $mid + $final;

        echo "Best two CT's total: $besttwo<br>";
        echo "Midterm marks: $mid <br>";
        echo "Final marks : $final <br><br>";
        
        echo "Total marks = $total <br>";

        if ($total > 54) {
            echo "Status : Passed";
        } else {
            echo "Status : Failed";
        }



    }
    ?>

    <form method="POST" action="">
        <label>CT1: </label>
        <input type="Number" name="ct1">
        <br>
        <br>
        <label>CT2: </label>
        <input type="Number" name="ct2">
        <br>
        <br>
        <label>CT3: </label>
        <input type="Number" name="ct3">
        <br>
        <br>
        <label>Midterm Marks: </label>
        <input type="Number" name="mid">
        <br>
        <br>
        <label>Final Marks: </label>
        <input type="Number" name="final">
        <br>
        <br>
        <button type="submit">Calculate Total</button>
    </form>
</body>

</html>