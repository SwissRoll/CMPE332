<?php
$company = $_POST["company"];

$pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");
	    
/*$sql = "ALTER TABLE conference.sponsor_attendees DROP CONSTRAINT company;
		ALTER TABLE conference.sponsor_attendees ADD CONSTRAINT company_cascade
		FOREIGN KEY";*/
	
$sql = "DELETE FROM sponsor_companies WHERE name = $company";
$stmt = $pdo->prepare($sql);
$stmt->execute(array($company));

echo "Successfully deleted sponsor";

?>

