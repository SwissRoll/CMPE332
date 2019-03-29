<?php
    $name = $_POST["name"];
    $startTime = $_POST["startTime"];
    $endTime = $_POST["endTime"];
    $day = $_POST["day"];
    $location = $_POST["location"];

    $pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");
    $sql = "UPDATE sessions SET roomNum=?, startTime=?, endTime=?, day=? WHERE sName=?;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($location, $startTime, $endTime, $day, $name));
?>