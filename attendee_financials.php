<?php
    $pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");
    $sql = "Select count(aID) total, sum(cost) sumCost, type, cost from attendees group by type;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    while ($row = $stmt->fetch()) {
        echo "<tr>
        <td>" . $row["type"] . "</td>
        <td>" . $row["total"] . "</td>
        <td>" . $row["cost"] . "</td>
        <td>" . $row["sumCost"] . "</td>
        </tr>";
    }
    $sql = "Select sum(cost) sumCost from attendees ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $row = $stmt->fetch();

    echo "<tr>
    <td colspan=\"3\"><b>Total</b></td>
    <td><b>" . $row["sumCost"] . "</b></td>
    </tr>";
?>