<?php
session_start();
include("db.php");

if (!isset($_SESSION["id"])) {
    die("Acceso denegado.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $titulo = $_POST["titulo"];
    $contenido = $_POST["contenido"];

    $sql = "INSERT INTO noticias (titulo, contenido)
            VALUES ('$titulo', '$contenido')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../HTML/dashboard.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
