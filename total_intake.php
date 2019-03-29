<?php
    $pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");
    $sql = "Select sum(cost) sumCost from attendees ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $attendees = $stmt->fetch();

    $sql = "Select sum(cost) sumCost from sponsor_companies ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $sponsors = $stmt->fetch();

    $sql = "Select sum(cost) sumCost from sponsor_companies ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $sponsors = $stmt->fetch();

    echo "<tr>
    <td><b>Total Intake from Attendees ($)</b></td>
    <td><b>" . $attendees["sumCost"] . "</b></td>
    </tr>";

    echo "<tr>
    <td><b>Total Intake from Sponsors ($)</b></td>
    <td><b>" . $sponsors["sumCost"] . "</b></td>
    </tr>";

    $sum = (float)$sponsors["sumCost"] + (float)$attendees["sumCost"];

    echo "<tr>
    <td><b>Total Overall Intake ($)</b></td>
    <td><b>" . $sum . "</b></td>
    </tr>";
?>