<?php
$pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");

$sql = "SELECT SUM(cost) as sum_cost FROM sponsor_companies;";
$stmt = $pdo->prepare($sql);   
$stmt->execute();

while ($row = $stmt->fetch()) {
    echo "<tr><td>"."Total:"."</td><td>".$row["sum_cost"]."</td></tr>";
}

?>