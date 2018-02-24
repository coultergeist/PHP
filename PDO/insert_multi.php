<?php
/**
 * Created by PhpStorm.
 * User: zw251y
 * Date: 3/10/2016
 * Time: 2:49 PM
 */
include "conn_proc.php";
/*
$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com');";
$sql .= "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('Mary', 'Moe', 'mary@example.com');";
$sql .= "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('Julie', 'Dooley', 'julie@example.com')";

echo "Insert statement: <br/> $sql <br/> ";

if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
*/


$rows = array(
    array(
    'firstname' => 'John',
    'lastname' => "Doe",
    'email' => 'john@example.com'
    ),
    array(
        'firstname' => 'Mary',
        'lastname' => "Moe",
        'email' => 'mary@example.com'
    ),
    array(
        'firstname' => 'Julie',
        'lastname' => "Dooley",
        'email' => 'julie@example.com'
    )
);

$sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES (:firstname, :lastname, :email);";

$stmt = $pdo->prepare($sql);

foreach ($rows as $row) {
    $stmt->execute($row);
}

$pdo = null;
