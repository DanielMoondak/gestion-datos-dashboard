<?php
// Conexión a la base de datos (debes tener el código de conexión en este archivo o incluirlo)

// Preparar la consulta SQL para consultar todos los registros
$sql = "SELECT * FROM tu_tabla";
$resultado = $conn->query($sql);

// Verificar si se encontraron resultados
if ($resultado->num_rows > 0) {
    // Mostrar los datos en una tabla
    echo "<h2>Registros encontrados:</h2>";
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
            </tr>";

    // Recorrer cada fila de resultados
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>
                <td>".$fila['id']."</td>
                <td>".$fila['nombre']."</td>
                <td>".$fila['email']."</td>
              </tr>";
    }

    echo "</table>";

} else {
    echo "No se encontraron registros";
}

// Cerrar la conexión
$conn->close();
?>
