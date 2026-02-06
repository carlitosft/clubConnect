<?php
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit();
}

if ($_SESSION["rol"] != "admin") {
    echo "⛔ No tenés permisos para agregar jugadores.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Agregar jugador</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<nav class="navbar">
  <h1 class="logo">ClubConnect</h1>

  <div class="links">
    <a href="jugadores.php">Jugadores</a>
    <a href="dashboard.php">Panel</a>
    <a href="../php/logout.php" class="btn">Salir</a>
  </div>
</nav>

<section class="section">

  <h2>➕ Registrar jugador</h2>

  <form action="../php/guardar_jugador.php"
   method="POST"
   enctype="multipart/form-data"
    class="form-box">

      <input type="text" name="nombre"
             placeholder="Nombre del jugador" required>

      <input type="number" name="edad"
             placeholder="Edad" required>

      <input type="text" name="posicion"
             placeholder="Posición" required>

      <!-- ✅ NUEVO: CATEGORÍA -->
      <select name="categoria" required>
          <option value="">Seleccionar categoría</option>
          <option value="Primera">Primera</option>
          <option value="Sub17">Sub-17</option>
          <option value="Sub15">Sub-15</option>
          <option value="Femenino">Femenino</option>
          <option value="Reserva">Reserva</option>
      </select>

      <input type="file" name="foto" accept="image/*">


      <button type="submit" class="cta">
        Guardar jugador
      </button>

  </form>

  <br>
  <a href="jugadores.php" class="btn">⬅ Volver</a>

</section>

</body>
</html>
