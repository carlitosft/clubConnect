<?php
session_start();
include("db.php");

if (!isset($_SESSION["id"]) || $_SESSION["rol"] != "admin") {
    echo "⛔ No autorizado.";
    exit();
}

$id = $_GET["id"];

$conn->query("DELETE FROM jugadores WHERE id=$id");

header("Location: ../html/jugadores.php");
exit();
?>
