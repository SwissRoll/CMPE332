<?php
    $pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");
    $sql = "SELECT DISTINCT day FROM sessions ORDER BY day ASC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    echo "<div class=\"item\">All</div>";
    while ($row = $stmt->fetch()) {
        echo "<div class=\"item\">" . $row["day"] . "</div>";
    }
?>