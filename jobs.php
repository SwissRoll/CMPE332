<?php
$companies = $_POST["companies"];

if (is_null($companies) || !isset($companies) || empty($companies))
{
    $pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");
    $sql = "SELECT * FROM jobs;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($companies));

    $out = "<div class=\"item\">
        <div class=\"content\"> 
            <table class=\"header\">
                <tr>
                <th>Company</th>
                <th>Position</th>
                <th>City</th>
                <th>Province</th>
                <th>Pay</th> 
                </tr>";

    while ($row = $stmt->fetch()) {
        $out .= "<tr>
                    <td>".$row["company"]."</td>
                    <td>".$row["name"]."</td>
                    <td>".$row["city"]."</td>
                    <td>".$row["province"]."</td>
                    <td>".$row["pay"]."</td>
                </tr>";
    }

    $out .= "</table> </div> </div>";
    echo $out;
}
else
{
    $pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");
    $sql = "SELECT * FROM jobs where company=?;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($companies));

    $out = "<div class=\"item\">
        <div class=\"content\"> 
            <table class=\"header\">
                <tr>
                <th>Company</th>
                <th>Position</th>
                <th>City</th>
                <th>Province</th>
                <th>Pay</th> 
                </tr>";

    while ($row = $stmt->fetch()) {
        $out .= "<tr>
                    <td>".$row["company"]."</td>
                    <td>".$row["name"]."</td>
                    <td>".$row["city"]."</td>
                    <td>".$row["province"]."</td>
                    <td>".$row["pay"]."</td>
                </tr>";
    }

    $out .= "</table> </div> </div>";
    echo $out;
}
?>