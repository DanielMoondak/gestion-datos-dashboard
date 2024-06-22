<?php
$host = 'danielvila.000webhostapp.com';
$db = 'id22349349_dashboard';
$user = 'id22349349_daniel';
$password = 'Dani123$';

$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
