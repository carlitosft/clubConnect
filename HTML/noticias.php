<?php
include("../php/db.php");

$resultado = $conn->query("SELECT * FROM noticias ORDER BY fecha DESC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Noticias del Club</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<header class="navbar">
  <h1 class="logo">ClubConnect</h1>
  <nav class="links">
    <a href="index.html">Inicio</a>
    <a href="dashboard.php">panel</a>
    <a href="entrenamientos.php">Entrenamientos</a>
     <a href="jugadores.php">⚽ Ver jugadores registrados</a>
  </nav>
</header>

<section class="section">
  <h2>📰 Noticias del Club</h2>

  <?php while($fila = $resultado->fetch_assoc()) { ?>
    <div class="card">
      <h3><?php echo $fila["titulo"]; ?></h3>
      <p><?php echo $fila["contenido"]; ?></p>
      <small><?php echo $fila["fecha"]; ?></small>
    </div>
  <?php } ?>

</section>

</body>
</html>
