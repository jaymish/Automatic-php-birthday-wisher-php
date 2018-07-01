<?php
error_reporting(1);
$servername = "localhost";
$username = "root";
$password = "";
$dbname= "sms_test";
// Create connection
$conn = new mysqli($servername, $username, $password ,$dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
?>