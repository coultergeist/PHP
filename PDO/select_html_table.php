<?php
/**
 * Created by PhpStorm.
 * User: zw251y
 * Date: 3/10/2016
 * Time: 2:55 PM
 */

include "conn_proc.php";
/*
$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table><tr><th>ID</th><th>Name</th></tr>";
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td> {$row['id']}</td><td> {$row['firstname']}</td><td> {$row['lastname']}</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
*/
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th>Firstname</th><th>Lastname</th></tr>";

class TableRows extends RecursiveIteratorIterator
{
    public function __construct($it)
    {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    public function current()
    {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    public function beginChildren()
    {
        echo "<tr>";
    }

    public function endChildren()
    {
        echo "</tr>" . "\n";
    }
}


$stmt = $pdo->prepare("SELECT id, firstname, lastname FROM MyGuests");
$stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }

    $pdo = null;

    echo "</table>";