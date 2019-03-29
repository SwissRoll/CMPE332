<?php
    $pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");
    $sql = "SELECT * FROM jobs";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    while ($row = $stmt->fetch()) {
        echo "<tr>
                    <td>".$row["company"]."</td>
                    <td>".$row["name"]."</td>
                    <td>".$row["city"]."</td>
                    <td>".$row["province"]."</td>
                    <td>".$row["pay"]."</td>
                </tr>";
    }
?>