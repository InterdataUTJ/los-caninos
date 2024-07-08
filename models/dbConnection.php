<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "veterinaria";

// Create connection
$mysql_conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($mysql_conn->connect_error) {
  die("Connection failed: " . $mysql_conn->connect_error);
}
?>