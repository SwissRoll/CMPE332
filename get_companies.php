<?php
    $pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");
    $sql = "SELECT DISTINCT name FROM sponsor_companies ORDER BY name";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    while ($row = $stmt->fetch()) {
        echo "<option>" . $row["name"] . "</option>";
    }
?>