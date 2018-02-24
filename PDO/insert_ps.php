<?php
/**
 * Created by PhpStorm.
 * User: zw251y
 * Date: 3/10/2016
 * Time: 2:52 PM
 */
include "conn_proc.php";
/*
/// prepare and bind
$stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $firstname, $lastname, $email);

// set parameters and execute
$firstname = "John";
$lastname = "Doe";
$email = "john@example.com";
$stmt->execute();

$firstname = "Mary";
$lastname = "Moe";
$email = "mary@example.com";
$stmt->execute();

$firstname = "Julie";
$lastname = "Dooley";
$email = "julie@example.com";
$stmt->execute();

echo "New records created successfully";

$stmt->close();
$conn->close();
*/

$stmt = $pdo->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (:firstname, :lastname, :email)");

$stmt->execute(array(
    "firstname" => "Mary",
    "lastname" => "Moe",
    "email" => "mary@example.com",
    "email" => "julie@example.com"
));

$stmt->execute(array(
    "firstname" => "Julie",
    "lastname" => "Dooley",
    "email" => "julie@example.com"
));


$stmt = null;