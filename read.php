<?php
require 'db.php';

$sql = "SELECT * FROM wifi";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["ssid"] . "</td>
                <td>" . $row["password"] . "</td>
                <td>
                    <form action='update.php' method='POST'>
                        <input type='hidden' name='id' value='" . $row["id"] . "'>
                        <input type='text' name='ssid' value='" . $row["ssid"] . "' required>
                        <input type='text' name='password' value='" . $row["password"] . "' required>
                        <button type='submit'>Actualizar</button>
                    </form>
                    <form action='delete.php' method='POST'>
                        <input type='hidden' name='id' value='" . $row["id"] . "'>
                        <button type='submit'>Eliminar</button>
                    </form>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='4'>No hay registros</td></tr>";
}

$conn->close();
?>
