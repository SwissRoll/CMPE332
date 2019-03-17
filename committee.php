<?php
$committee = $_POST["committee"];
$pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");
$sql = "SELECT fname, lname FROM committee_members, committee WHERE chairID=cID AND name= ?;";
$stmt = $pdo->prepare($sql);   
$stmt->execute(array($committee));

while ($row = $stmt->fetch()) {
    echo "<div class=\"item\">
    <div class=\"content\">
      <a class=\"header\">".$row["fname"]." ".$row["lname"]."</a>
      <div class=\"description\">Committee Chair</div>
    </div>
  </div>";
}

$sql = "SELECT fname, lname FROM committee_membership natural join committee_members WHERE committeeName=? AND cID NOT IN (SELECT chairID FROM committee WHERE name=?);";
$stmt = $pdo->prepare($sql);   
$stmt->execute(array($committee, $committee));

while ($row = $stmt->fetch()) {
    echo "<div class=\"item\">
    <div class=\"content\">
      <a class=\"header\">".$row["fname"]." ".$row["lname"]."</a>
    </div>
  </div>";
}

?>