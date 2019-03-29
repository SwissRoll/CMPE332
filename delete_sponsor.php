<?php
$company = $_POST["company"];

$pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");
	
$sql = "DELETE FROM sponsor_companies WHERE name = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute(array($company));

echo "Successfully deleted sponsor";

?>

