<?php
// Conexión a la base de datos (debes tener el código de conexión en este archivo o incluirlo)

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nuevo_nombre = $_POST['nuevo_nombre'];
    $nuevo_email = $_POST['nuevo_email'];

    // Preparar la consulta SQL para actualizar
    $sql = "UPDATE tu_tabla SET nombre='$nuevo_nombre', email='$nuevo_email' WHERE id=$id";

    // Ejecutar la consulta y verificar
    if ($conn->query($sql) === TRUE) {
        echo "Registro actualizado correctamente";
    } else {
        echo "Error al actualizar registro: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>
