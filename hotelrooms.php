<?php
$guests_list = $_POST["guests_list"];
$pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");
$sql = "SELECT fname, lname FROM attendees natural join students natural join hotel_rooms WHERE roomNum=?;";
$stmt = $pdo->prepare($sql);
$stmt->execute(array($guests_list));

while ($row = $stmt->fetch()) {
    echo "<div class=\"item\">
    <div class=\"content\">
      <a class=\"header\">".$row["fname"]." ".$row["lname"]."</a>
    </div>
  </div>";
}

?>