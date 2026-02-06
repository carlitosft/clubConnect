<?php
session_start();
include("db.php");

/* Solo admins pueden publicar */
if (!isset($_SESSION["rol"]) || $_SESSION["rol"] != "admin") {
    die("Acceso denegado ❌");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $fecha = $_POST["fecha"];
    $hora = $_POST["hora"];

    $sql = "INSERT INTO entrenamientos (titulo, descripcion, fecha, hora)
            VALUES ('$titulo', '$descripcion', '$fecha', '$hora')";

    if ($conn->query($sql)) {
        header("Location: ../html/entrenamientos.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
