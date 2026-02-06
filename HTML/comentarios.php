<?php
session_start();
include("../php/db.php");

if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit();
}
?>

<h2>💬 Foro del Club</h2>

<!-- FORM PARA NUEVO COMENTARIO -->
<form action="../php/publicar_comentario.php" method="POST">

    <textarea name="contenido" placeholder="Escribí tu comentario..." required></textarea>
    <br>

    <button type="submit">Publicar</button>

</form>

<hr>

<h3>📌 Comentarios recientes</h3>

<?php
$sql = "SELECT comentarios.*, usuarios.nombre 
        FROM comentarios 
        JOIN usuarios ON comentarios.usuario_id = usuarios.id
        ORDER BY fecha DESC";

$resultado = $conn->query($sql);

while ($comentario = $resultado->fetch_assoc()):
?>

<div style="border:1px solid white; padding:10px; margin:10px;">

    <b><?php echo $comentario["nombre"]; ?></b>
    <p><?php echo $comentario["contenido"]; ?></p>
    <small><?php echo $comentario["fecha"]; ?></small>

    <!-- RESPONDER -->
    <form action="../php/publicar_respuesta.php" method="POST">
        <input type="hidden" name="comentario_id" value="<?php echo $comentario["id"]; ?>">

        <input type="text" name="contenido" placeholder="Responder..." required>

        <button type="submit">Enviar</button>
    </form>

    <!-- MOSTRAR RESPUESTAS -->
    <?php
    $idComentario = $comentario["id"];

    $sqlResp = "SELECT respuestas.*, usuarios.nombre 
                FROM respuestas
                JOIN usuarios ON respuestas.usuario_id = usuarios.id
                WHERE comentario_id = $idComentario
                ORDER BY fecha ASC";

    $respuestas = $conn->query($sqlResp);

    while ($resp = $respuestas->fetch_assoc()):
    ?>

        <div style="margin-left:30px; border-left:2px solid gray; padding-left:10px;">
            <b><?php echo $resp["nombre"]; ?></b>
            <p><?php echo $resp["contenido"]; ?></p>
        </div>

    <?php endwhile; ?>

</div>

<?php endwhile; ?>
