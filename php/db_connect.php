<?php
 
$serverName = 'localhost';
$username = 'root';
$password = '';
$dbName = 'methcartel';

 
$conn = mysqli_connect($serverName, $username, $password, $dbName);
 
if ($conn->connect_error) {
    die("Connection failed Unfortunately, hackerman: " . $conn->connect_error);
    exit(1);
}
?>
 