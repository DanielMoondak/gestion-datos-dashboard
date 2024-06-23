<?php
// Conexión a la base de datos (debes tener el código de conexión en este archivo o incluirlo)

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    // Preparar la consulta SQL para eliminar
    $sql = "DELETE FROM tu_tabla WHERE id=$id";

    // Ejecutar la consulta y verificar
    if ($conn->query($sql) === TRUE) {
        echo "Registro eliminado correctamente";
    } else {
        echo "Error al eliminar registro: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>
