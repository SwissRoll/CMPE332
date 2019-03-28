<?php
$pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");
$sql = "SELECT name, cost FROM sponsor_companies;";
$stmt = $pdo->prepare($sql);   
$stmt->execute();

while ($row = $stmt->fetch()) {
    echo "<tr><td>".$row["name"]."</td><td>".$row["cost"]."</td></tr>";
}

?>