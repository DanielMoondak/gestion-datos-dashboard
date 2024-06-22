<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $ssid = $_POST['ssid'];
    $password = $_POST['password'];

    $sql = "UPDATE wifi SET ssid='$ssid', password='$password' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro actualizado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: index.html");
    exit();
}
?>
