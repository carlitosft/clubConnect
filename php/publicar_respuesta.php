<?php
session_start();
include("db.php");

if (!isset($_SESSION["id"])) exit();

$comentario_id = $_POST["comentario_id"];
$contenido = $_POST["contenido"];
$usuario_id = $_SESSION["id"];

$sql = "INSERT INTO respuestas (comentario_id, usuario_id, contenido)
        VALUES ($comentario_id, $usuario_id, '$contenido')";

$conn->query($sql);

header("Location: ../html/comentarios.php");
exit();
?>
