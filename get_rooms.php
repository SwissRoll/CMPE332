<?php
    $pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");
    $sql = "SELECT hotel_rooms.roomNum FROM students right join hotel_rooms on students.roomNum = hotel_rooms.roomNum group by hotel_rooms.roomNum having COUNT(aID) > 0";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    while ($row = $stmt->fetch()) {
        echo "<option>" . $row["roomNum"] . "</option>";
    }
?>