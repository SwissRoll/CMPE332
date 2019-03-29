<?php
    $pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");
    $sql = "SELECT DISTINCT day FROM sessions ORDER BY day ASC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    while ($row = $stmt->fetch()) {
        echo "<option>" . $row["day"] . "</option>";
    }
?>