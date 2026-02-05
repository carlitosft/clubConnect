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

  <!-- NAVBAR -->
  <nav class="navbar">
    <h1 class="logo">ClubConnect</h1>

    <div class="links">
      <a href="dashboard.php">Panel</a>
      <a href="noticias.php">Noticias</a>

      <a href="../HTML/logout.php" class="btn">Cerrar sesión</a>
    </div>
  </nav>


  <!-- HERO / BIENVENIDA -->
  <section class="hero">
    <h2>Bienvenido, <?php echo $_SESSION["nombre"]; ?> 👋</h2>

    <p>Este es tu panel privado del club.</p>

    <div class="dashboard-links">

      <a href="noticias.php" class="cta">
        📰 Ver Noticias del Club
      </a>

      <a href="entrenamientos.php" class="cta">
        📅 Próximos Entrenamientos
      </a>

      <a href="jugadores.php" class="cta">
        ⚽ Jugadores Registrados
      </a>

      <a href="comentarios.php" class="cta">
        💬 Comentarios del Equipo
      </a>

    </div>
  </section>


  <!-- PUBLICAR NOTICIA (SOLO ADMIN) -->
  <?php if(isset($_SESSION["rol"]) && $_SESSION["rol"] == "admin") { ?>

    <section class="section">
      <h3>📢 Publicar nueva noticia</h3>

      <form action="../php/publicar_noticia.php" method="POST" class="form-box">

        <input type="text" name="titulo" placeholder="Título de la noticia" required>

        <textarea name="contenido" placeholder="Contenido..." required></textarea>

        <button type="submit" class="cta">Publicar</button>

      </form>
    </section>

  <?php } ?>

</body>
</html>
