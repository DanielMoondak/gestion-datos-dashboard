<?php
// Conexión a la base de datos (debes tener el código de conexión en este archivo o incluirlo)

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];

    // Preparar la consulta SQL para insertar
    $sql = "INSERT INTO tu_tabla (nombre, email) VALUES ('$nombre', '$email')";

    // Ejecutar la consulta y verificar
    if ($conn->query($sql) === TRUE) {
        echo "Registro insertado correctamente";
    } else {
        echo "Error al insertar registro: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>
