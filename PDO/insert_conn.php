<?php
/**
 * Created by PhpStorm.
 * User: zw251y
 * Date: 3/10/2016
 * Time: 2:45 PM
 */

include "conn_proc.php";
/*
$sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
*/
$sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES(:firstname, :lastname, :email)";

$stmt = $pdo->prepare($sql);
$stmt->execute(array(
    "firstname" => "Wesley",
    "lastname" => "Snipes",
    "email" => "w.snipes@gmail.com"
));

if ($stmt->execute()) {
    print "New record created successfully";
} else {
    print "Error: " . $sql . "<br>" . $pdo->errorCode();
}


$pdo = null;

