<?php
    $pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");
    $sql = "SELECT sName FROM sessions";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    while ($row = $stmt->fetch()) {
        echo "<option>" . $row["sName"] . "</option>";
    }
?>