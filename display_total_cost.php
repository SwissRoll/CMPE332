<?php
$pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");

$sql = "SELECT SUM(cost) as sum_cost1 FROM sponsor_companies;";
$stmt = $pdo->prepare($sql);   
$stmt->execute();

$row = $stmt->fetch();
$sum1 = $row["sum_cost1"];

$sql = "SELECT SUM(cost) as sum_cost2 FROM attendees;";
$stmt = $pdo->prepare($sql);   
$stmt->execute();

$row = $stmt->fetch();
$total = $sum1 + $row["sum_cost2"];

echo "<tr><td>"."Total:"."</td><td>".$total."</td></tr>";
?>

