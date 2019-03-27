<?php
$type = $_POST["type"];
$pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");
$sql = "SELECT fname, lname FROM attendees WHERE type=?;";
$stmt = $pdo->prepare($sql);   
$stmt->execute(array($type));

echo "<div class=\"ui small header\">".ucfirst($type)."</div>
		<table id=\"" . $type . "_data_table\" class=\"ui celled table\" style=\"width:100%\">
			<thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
				</tr>
			</thead>
            <tbody id=\"". $type."\">";

            while ($row = $stmt->fetch()) {
    echo "<tr><td>".$row["fname"]."</td><td>".$row["lname"]."</td></tr>";
}
                        
echo "
			</tbody>
		</table>";


?>