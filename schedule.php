<?php
    $day =  $_POST["day"];

    $pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");

    if ($day == "all") {
        $sql = "SELECT DISTINCT day FROM sessions";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        while ($row = $stmt->fetch()) {
            echo "<div class=\"ui small header\"></div>";
            echo "<div class=\"ui small dividing header\">" . $row["day"] . "</div>";
            echo "<div class=\"ui divided list\">";
            
            $sql = "SELECT  fname, lname, sName, roomNum, startTime, endTime FROM sessions natural join speakers natural join attendees  WHERE day = ? ORDER BY startTime ASC";
            $new_stmt = $pdo->prepare($sql);
            $new_stmt->execute(array( $row["day"]));


            while ($new_row = $new_stmt->fetch()) {
                echo "<div class=\"item\">";
                echo "<div class=\"content\">";
                echo "<a class=\"header\">" . $new_row["sName"] . "</a>";
                echo "<div class=\"description\">";
                echo "<div class=\"list\">";
                echo "<div class=\"item\">Speaker: " . $new_row["fname"] . " " . $new_row["lname"] . "</div>";
                echo "<div class=\"item\">Room: " . $new_row["roomNum"] . "</div>";
                echo "<div class=\"item\">Start Time: " . $new_row["startTime"] . "</div>";
                echo "<div class=\"item\">End Time: " . $new_row["endTime"] . "</div>";
                echo "</div></div></div></div>";
            }
            echo "</div";
        }

    } else {
        echo "<div class=\"ui small header\"></div>";
        echo "<div class=\"ui small dividing header\">" . $day . "</div>";
        echo "<div class=\"ui divided list\">";
        
        $sql = "SELECT  fname, lname, sName, roomNum, startTime, endTime FROM sessions natural join speakers natural join attendees  WHERE day = ? ORDER BY startTime ASC";
        $new_stmt = $pdo->prepare($sql);
        $new_stmt->execute(array($day));


        while ($new_row = $new_stmt->fetch()) {
            echo "<div class=\"item\">";
            echo "<div class=\"content\">";
            echo "<a class=\"header\">" . $new_row["sName"] . "</a>";
            echo "<div class=\"description\">";
            echo "<div class=\"list\">";
            echo "<div class=\"item\">Speaker: " . $new_row["fname"] . " " . $new_row["lname"] . "</div>";
            echo "<div class=\"item\">Room: " . $new_row["roomNum"] . "</div>";
            echo "<div class=\"item\">Start Time: " . $new_row["startTime"] . "</div>";
            echo "<div class=\"item\">End Time: " . $new_row["endTime"] . "</div>";
            echo "</div></div></div></div>";
        }
        echo "</div";

    }
?>