<?php

define('DBINFO', 'mysqli:host=localhost;dbname=crud;');
define('DBUSER', 'root');
define('DBPASS', '');


// $host = "localhost";
// $dbname = "crud";
// $user = "root";
// $password = "";

$conn = new mysqli("localhost", "root", "", "crud");
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

