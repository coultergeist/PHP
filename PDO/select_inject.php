<?php
/**
 * Created by PhpStorm.
 * User: zw251y
 * Date: 3/10/2016
 * Time: 2:53 PM
 */

include "conn_proc.php";
$input = "1 or 1=1";
$sql = "SELECT id, firstname, lastname FROM MyGuests WHERE id = $input ";
/*
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
*/

$stmt = $pdo->prepare($sql);
$stmt->execute();
$arr = $stmt->fetchAll();
if(!$arr) {
    exit('No rows');
}else {
    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
}
var_export($arr);
$stmt = null;