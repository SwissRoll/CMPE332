<?php
$type = $_POST["type"];
$pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");

$sql = "SELECT SUM(cost) as sum_cost FROM attendees where type=?;";
$stmt = $pdo->prepare($sql);   
$stmt->execute(array($type));

while ($row = $stmt->fetch()) {
    echo "<tr><td>"."Total:"."</td><td>".$row["sum_cost"]."</td></tr>";
}

?>