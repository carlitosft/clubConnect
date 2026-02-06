<?php
session_start();
include("db.php");

if (!isset($_SESSION["id"])) exit();

$contenido = $_POST["contenido"];
$usuario_id = $_SESSION["id"];

$sql = "INSERT INTO comentarios (usuario_id, contenido)
        VALUES ($usuario_id, '$contenido')";

$conn->query($sql);

header("Location: ../html/comentarios.php");
exit();
?>
