<?php
$pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");
$sql = "SELECT name, tier FROM sponsor_companies;";
$stmt = $pdo->prepare($sql);   
$stmt->execute();

echo "<table id=\"sponsor_data_table\" class=\"ui celled table\" style=\"width:100%\">
			<thead>
                <tr>
                    <th>Company Name</th>
                    <th>Sponsorship Level</th>
				</tr>
			</thead>
            <tbody>";

            while ($row = $stmt->fetch()) {
    echo "<tr><td>".$row["name"]."</td><td>".$row["tier"]."</td></tr>";
}
                        
echo "
			</tbody>
		</table>";


?>