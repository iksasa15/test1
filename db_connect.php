<?php
$servername = getenv('MYSQLHOST') ?: 'localhost';
$username = getenv('MYSQLUSER') ?: 'root';
$password = getenv('MYSQLPASSWORD');
$password = $password === false ? '' : $password;
$dbname = getenv('MYSQLDATABASE') ?: 'graduation_projects';
$port = (int)(getenv('MYSQLPORT') ?: 3306);

$conn = new mysqli($servername, $username, $password, $dbname, $port);
$conn->set_charset('utf8mb4');

if ($conn->connect_error) {
    die('فشل الاتصال: ' . $conn->connect_error);
}
