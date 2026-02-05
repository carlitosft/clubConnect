<?php
session_start();

/* 
   Si no existe la sesión, significa que el usuario NO inició sesión
*/
if (!isset($_SESSION["id"])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel del Club</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>

  <nav class="navbar">
    <h1 class="logo">ClubConnect</h1>

    <div class="links">
      <a href="logout.php" class="btn">Cerrar sesión</a>
    </div>
  </nav>

  <section class="hero">
    <h2>Bienvenido, <?php echo $_SESSION["nombre"]; ?> 👋</h2>

    <p>Este es tu panel privado del club.</p>

    <p>Desde acá vas a poder ver:</p>

    <ul style="text-align:left; max-width:400px;">
      <li>📢 Noticias del club</li>
      <li>📅 Entrenamientos</li>
      <li>⚽ Jugadores registrados</li>
      <li>💬 Comentarios del equipo</li>
    </ul>
  </section>

</body>
</html>
