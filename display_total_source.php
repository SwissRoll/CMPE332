<?php
$pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");

$sql = "SELECT SUM(cost) as sum_cost1 FROM sponsor_companies;";
$stmt = $pdo->prepare($sql);   
$stmt->execute();

$row = $stmt->fetch();
$sponsor = $row["sum_cost1"];

$sql = "SELECT SUM(cost) as sum_cost2 FROM attendees;";
$stmt = $pdo->prepare($sql);   
$stmt->execute();

$row = $stmt->fetch();
$attendees = $row["sum_cost2"];

echo "<tr><td>"."Sponsors"."</td><td>".$sponsor."</td></tr>";
echo "<tr><td>"."Attendees"."</td><td>".$attendees."</td></tr>";
?>