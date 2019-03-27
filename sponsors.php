<?php
$sponsor_name = $_POST["sponsor_name"];
$pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");
$sql = "SELECT * FROM sponsor_companies;";
$stmt = $pdo->prepare($sql);
$stmt->execute(array($sponsor_name));
$out = "<div class=\"item\">
	<div class=\"content\"> 
		<table class=\"header\">
			<tr>
			<th>Company</th>
			<th>Level of Sponsorship</th>
			</tr>";
while ($row = $stmt->fetch()) {
	$out .= "<tr>
				<td>".$row["name"]."</td>
				<td>".$row["tier"]."</td>
			</tr>";
}
$out .= "</table> </div> </div>";
echo $out;

?>