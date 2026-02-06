<?php
session_start();
include("../php/db.php");

if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM jugadores ORDER BY categoria, nombre";
$resultado = $conn->query($sql);

$categoriaActual = "";
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Jugadores</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar">
  <h1 class="logo">ClubConnect</h1>

  <div class="links">
    <a href="dashboard.php">Panel</a>
    <a href="noticias.php">Noticias</a>
    <a href="entrenamientos.php">Entrenamientos</a>
  </div>
</nav>

<section class="section">

  <h2>⚽ Jugadores registrados</h2>

  <!-- SOLO ADMIN: AGREGAR -->
  <?php if ($_SESSION["rol"] == "admin"): ?>
      <a href="agregar_jugador.php" class="cta">
        ➕ Agregar jugador
      </a>
  <?php endif; ?>

  <hr>

  <!-- LISTA AGRUPADA -->
  <?php while ($jugador = $resultado->fetch_assoc()): ?>

      <!-- CAMBIO DE CATEGORÍA -->
      <?php if ($categoriaActual != $jugador["categoria"]): 
          $categoriaActual = $jugador["categoria"];
      ?>

          <h3 style="margin-top:30px;">
            📌 <?php echo $categoriaActual; ?>
          </h3>

      <?php endif; ?>

      <!-- CARD JUGADOR -->
      <div class="card">

    <!-- FOTO -->
    <?php if (!empty($jugador["foto"])) { ?>
        <img src="../uploads/jugadores/<?php echo $jugador["foto"]; ?>"
             width="120"
             style="border-radius:10px; margin-bottom:10px;">
    <?php } else { ?>
        <p>📷 Sin foto</p>
    <?php } ?>

    <h3><?php echo $jugador["nombre"]; ?></h3>
    <p>Edad: <?php echo $jugador["edad"]; ?></p>
    <p>Posición: <?php echo $jugador["posicion"]; ?></p>
    <p>Categoría: <?php echo $jugador["categoria"]; ?></p>

</div>

  <?php endwhile; ?>

  <br>
  <a href="dashboard.php" class="btn">⬅ Volver al Panel</a>

</section>

</body>
</html>
