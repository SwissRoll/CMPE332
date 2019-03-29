<?php
    $pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");
    $sql = "Select name, tier, cost from sponsor_companies;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    while ($row = $stmt->fetch()) {
        echo "<tr>
        <td>" . $row["name"] . "</td>
        <td>" . $row["tier"] . "</td>
        <td>" . $row["cost"] . "</td>
        </tr>";
    }
    $sql = "Select sum(cost) sumCost from sponsor_companies ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $row = $stmt->fetch();

    echo "<tr>
    <td colspan=\"2\"><b>Total</b></td>
    <td><b>" . $row["sumCost"] . "</b></td>
    </tr>";
?>