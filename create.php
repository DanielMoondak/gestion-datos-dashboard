<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ssid = $_POST['ssid'];
    $password = $_POST['password'];

    $sql = "INSERT INTO wifi (ssid, password) VALUES ('$ssid', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo registro creado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: index.html");
    exit();
}
?>
