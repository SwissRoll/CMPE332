<?php
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$sponsor = $_POST["sponsor"];
$type = $_POST["type"];

$pdo = new PDO('mysql:host=localhost;dbname=conference', "root", "");
if ($type == "student") {
    $sql = "SELECT hotel_rooms.roomNum FROM students right join hotel_rooms on students.roomNum = hotel_rooms.roomNum group by hotel_rooms.roomNum having"." COUNT(aID) <3 order by COUNT(aID) asc limit 1;";
    $stmt = $pdo->prepare($sql);   
    $stmt->execute();
    $row = $stmt->fetch();
    if ($row == false) {
        echo "No free hotel rooms available, unable to add attendee";
    } else {
        $room = $row["roomNum"];
    }

    $sql = "INSERT INTO attendees (fname,lname,type,cost) VALUES ( ?, ?, \"student\", \"50\")";
    $stmt = $pdo->prepare($sql);   
    $stmt->execute(array($fname, $lname));

    $sql = "SELECT aID FROM attendees ORDER by aID desc LIMIT 1;";
    $stmt = $pdo->prepare($sql);   
    $stmt->execute(array($fname, $lname));

    $row = $stmt->fetch();

    $aID = $row["aID"];

    $sql = "INSERT INTO students VALUES ( ?, ?)";
    $stmt = $pdo->prepare($sql);   
    $stmt->execute(array($aID, $room));

    echo "Successfully added attendee";

} elseif ($type == "sponsor")  {
    $sql = "INSERT INTO attendees (fname,lname,type,cost) VALUES ( ?, ?, \"sponsor\", \"0\")";
    $stmt = $pdo->prepare($sql);   
    $stmt->execute(array($fname, $lname));


    $sql = "SELECT aID FROM attendees ORDER by AID desc LIMIT 1;";
    $stmt = $pdo->prepare($sql);   
    $stmt->execute(array($fname, $lname));

    $row = $stmt->fetch();

    $aID = $row["aID"];

    $sql = "INSERT INTO sponsor_attendees VALUES ( ?, ?)";
    $stmt = $pdo->prepare($sql);   
    $stmt->execute(array($aID, $sponsor));

    echo "Successfully added attendee";

} else {
    $sql = "INSERT INTO attendees (fname,lname,type,cost) VALUES ( ?, ?, \"professional\", \"100\")";
    $stmt = $pdo->prepare($sql);   
    $stmt->execute(array($fname, $lname));

    echo "Successfully added attendee";
}


?>