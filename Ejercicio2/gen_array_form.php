<?php

$servername = "localhost";
$username = "iu2016";
$password = "iu2016";
$dbname = "IU2016";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "show columns from USUARIOS";
$result = $conn->query($sql);

$result->fetch_fields();

var_dump($result);

$conn->close();

?>
