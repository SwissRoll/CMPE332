<?php
$name = $_POST["name"];
$tier = $_POST["tier"];
$cost = $_POST["cost"];

$pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");
		
$sql = "INSERT INTO sponsor_companies (name,tier,cost,emailCount) VALUES ( ?, ?, ?, \"0\")";
$stmt = $pdo->prepare($sql);   
$stmt->execute(array($name, $tier, $cost));

echo "Successfully added sponsor";

?>