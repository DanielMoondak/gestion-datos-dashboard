<?php include 'conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Gestión de Datos</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Incluir scripts necesarios -->
    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
    <script src="js/main.js"></script>
</head>
<body>
    <header>
        <h1>Sistema de Gestión de Datos</h1>
    </header>
    <main>
        <!-- Aquí puedes incluir el contenido principal de tu aplicación -->
        <?php
            // Ejemplo de consulta y visualización de datos desde la base de datos
            $sql = "SELECT * FROM wifi";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table border='1'>
                <tr>
                <th>Nombre</th>
                <th>Colonia</th>
                <th>Alcaldia</th>
                <th>Latitud</th>
                <th>Longitud</th>
                <th>Puntos de acceso</th>
                <th>Programa</th>
                <th>Costo por punto</th>
                <th>Retorno de inversión</th>
                </tr>";
                
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['Nombre'] . "</td>";
                    echo "<td>" . $row['Colonia'] . "</td>";
                    echo "<td>" . $row['Alcaldia'] . "</td>";
                    echo "<td>" . $row['Latitud'] . "</td>";
                    echo "<td>" . $row['Longitud'] . "</td>";
                    echo "<td>" . $row['Puntos_de_acceso'] . "</td>";
                    echo "<td>" . $row['Programa'] . "</td>";
                    echo "<td>" . $row['Costo_punto'] . "</td>";
                    echo "<td>" . $row['Retorno_inv'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
            $conn->close();
        ?>
    </main>
    <footer>
        <p>&copy; <?php echo date('Y'); ?> Tu Empresa</p>
    </footer>
</body>
</html>
