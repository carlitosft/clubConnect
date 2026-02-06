<?php
session_start();
include("../php/db.php");

$resultado = $conn->query("SELECT * FROM entrenamientos ORDER BY fecha ASC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Entrenamientos</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<nav class="navbar">
  <h1 class="logo">ClubConnect</h1>

  <div class="links">
    <a href="index.html">Inicio</a>
    <a href="dashboard.php">Panel</a>
    <a href="noticias.php">Noticias</a>
     <a href="jugadores.php">⚽ Ver jugadores registrados</a>
    <a href="../php/logout.php" class="btn">Cerrar sesión</a>
  </div>
</nav>

<section class="section">
  <h2>📅 Próximos Entrenamientos</h2>

  <?php while($fila = $resultado->fetch_assoc()) { ?>
    <div class="card">
      <h3><?php echo $fila["titulo"]; ?></h3>
      <p><?php echo $fila["descripcion"]; ?></p>

      <small>
        📆 <?php echo $fila["fecha"]; ?> |
        ⏰ <?php echo $fila["hora"]; ?>
      </small>
    </div>
  <?php } ?>

</section>

</body>
</html>
