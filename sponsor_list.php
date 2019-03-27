<?php
$pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");
$sql = "SELECT name FROM sponsor_companies;";
$stmt = $pdo->prepare($sql);   
$stmt->execute();

echo "<label>Sponsor Company</label>
<select class=\"ui dropdown\" id=\"sponsor_dropdown\">";

while ($row = $stmt->fetch()) {
    echo "<option>".$row["name"]."</option>";
}

echo "</select>"

?>