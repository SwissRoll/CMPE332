<?php
    $pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");
    $sql = "SELECT DISTINCT roomNum FROM sessions ORDER BY roomNum ASC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    while ($row = $stmt->fetch()) {
        echo "<option>" . $row["roomNum"] . "</option>";
    }
?>