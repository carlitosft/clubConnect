<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Login - ClubConnect</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>

  <!-- NAVBAR -->
  <nav class="navbar">
    <h1 class="logo">ClubConnect</h1>

    <div class="links">
      <a href="index.html">Inicio</a>
      <a href="register.html" class="btn">Registrarse</a>
    </div>
  </nav>

  <?php
session_start();

if (isset($_SESSION["id"])) {
    header("Location: dashboard.php");
    exit();
}
?>

  <!-- FORMULARIO LOGIN -->
  <section class="hero">
    <h2>Iniciar sesión</h2>
    <p>Accedé a tu cuenta para ver las novedades del club.</p>

    <form class="form-box" action="../php/login.php" method="POST">

  <input type="email" name="email" placeholder="Correo electrónico" required>

  <input type="password" name="password" placeholder="Contraseña" required>

  <button type="submit" class="cta">
    Entrar
  </button>

</form>
  </section>

  <!-- FOOTER -->
  <footer>
    <p>Proyecto Personal Carlos - ClubConnect</p>
  </footer>

</body>
</html>
