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