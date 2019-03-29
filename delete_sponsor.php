<?php
$company = $_POST["company"];

$pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");
	    
/*$sql = "ALTER TABLE conference.sponsor_attendees DROP CONSTRAINT company;
		ALTER TABLE conference.sponsor_attendees ADD CONSTRAINT company_cascade
		FOREIGN KEY";*/
		
$sql = "SELECT name FROM sponsor_companies;";
$stmt = $pdo->prepare($sql);
$stmt->execute(array($companies));

$row = stmt->fetch()
if ($row["name"] == $company) {
	
	$sql = "DELETE FROM sponsor_companies WHERE name = $company";
	$stmt = $pdo->prepare($sql);

	$row = $stmt->fetch();

	$stmt->execute();

echo "Successfully deleted sponsor";
	
	
}

/*$sql = "DELETE FROM sponsor_companies WHERE name = $company";
$stmt = $pdo->prepare($sql);

$row = $stmt->fetch();

$stmt->execute();

echo "Successfully deleted sponsor";*/

?>

