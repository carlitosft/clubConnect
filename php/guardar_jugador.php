<?php
session_start();
include("db.php");

if ($_SESSION["rol"] != "admin") {
    echo "⛔ No autorizado.";
    exit();
}

$nombre = $_POST["nombre"];
$edad = $_POST["edad"];
$posicion = $_POST["posicion"];
$categoria = $_POST["categoria"]; // ✅ NUEVO

$fotoNombre = null;

if (!empty($_FILES["foto"]["name"])) {

    $carpetaDestino = "../uploads/jugadores/";

    $fotoNombre = time() . "_" . basename($_FILES["foto"]["name"]);

    $rutaFinal = $carpetaDestino . $fotoNombre;

    move_uploaded_file($_FILES["foto"]["tmp_name"], $rutaFinal);
}


$sql = "INSERT INTO jugadores (nombre, edad, posicion, categoria, foto)
        VALUES ('$nombre', '$edad', '$posicion', '$categoria', '$fotoNombre')";

if ($conn->query($sql)) {
    header("Location: ../html/jugadores.php");
} else {
    echo "Error: " . $conn->error;
}
?>
