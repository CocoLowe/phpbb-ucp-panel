<?php
$servername = "77.83.200.146";
$username = "sandreas";
$password = "qbAZ3RfFmpHKVB5e";
$dbname = "game_database";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Baglanti basarisiz: " . $conn->connect_error);
}?>