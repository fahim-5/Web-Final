<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h2> PHP forms</h2>

    <?php

    ?>

    <form method="POST" action="">
        <label>Name: </label>
        <input type="text" name="username">
        <br>
        <br>
        <label>Age: </label>
        <input type="Number" name="age">
        <br>
        <br>
        <button type="submit">Submit</button>
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
          $name = $_POST["username"];
          $age = $_POST["age"];

          echo" Name is ".$name."<br>";
          echo" Age is ".$age."<br>";
        }
    ?>

</body>

</html>