<?php
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$type = $_POST["type"];

$pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");
$sql = "SELECT fname, lname FROM attendees WHERE type=?;";
$stmt = $pdo->prepare($sql);   
$stmt->execute(array($type));

while ($row = $stmt->fetch()) {
    echo "<tr><td>".$row["fname"]."</td><td>".$row["lname"]."</td></tr>";
}

?>