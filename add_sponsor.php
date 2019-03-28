<?php
$name = $_POST["name"];
$tier = $_POST["tier"];
$cost = $_POST["cost"];

$pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");
/*if (($tier == "Bronze" && $cost >= 1000) || ($tier == "Silver" && $cost >= 3000) || 
	($tier == "Gold" && $cost >= 5000) || ($tier == "Platinum" && $cost >= 10000) || ) {*/
  /*  $sql = "SELECT * FROM sponsor_companies";
    $stmt = $pdo->prepare($sql);   
    $stmt->execute();
    $row = $stmt->fetch();*/
	    
    $sql = "INSERT INTO sponsor_companies (name,tier,cost) VALUES ( ?, ?, ?)";
    $stmt = $pdo->prepare($sql);   
    $stmt->execute(array($name, $tier, $cost));

   /* $sql = "SELECT aID FROM attendees ORDER by aID desc LIMIT 1;";
    $stmt = $pdo->prepare($sql);   
    $stmt->execute(array($fname, $lname));

    $row = $stmt->fetch();

    $aID = $row["aID"];*/

    $sql = "INSERT INTO sponsor_attendees VALUES (?)";
    $stmt = $pdo->prepare($sql);   
    $stmt->execute(array($name));

    echo "Successfully added sponsor";
//}

?>