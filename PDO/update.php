<?php
/**
 * Created by PhpStorm.
 * User: zw251y
 * Date: 3/10/2016
 * Time: 3:02 PM
 */
include "conn_proc.php";
/*
$sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
*/
$sql = "UPDATE MyGuests SET lastname='new' WHERE id=65";

$stmt = $pdo->prepare($sql);

if ($stmt->execute()) {
    print "Record updated successfully";
} else {
    print "Error updating record: " . $pdo->errorCode();
}
