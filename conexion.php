<?php
$servername = "danielvila.000webhostapp.com"; // Cambiar si es necesario
$username = "id22349349_daniel";
$password = "Dani123$";
$dbname = "id22349349_dashboard";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
