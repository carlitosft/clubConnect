<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    /* ✅ 1. Verificar si el email ya existe */
    $check = $conn->query("SELECT * FROM usuarios WHERE email = '$email'");

    if ($check->num_rows > 0) {
        echo "<h3 style='color:red;'>❌ Ese email ya está registrado.</h3>";
        echo "<a href='../html/register.html'>⬅ Volver al registro</a>";
        exit();
    }

    /* ✅ 2. Insertar si no existe */
    $sql = "INSERT INTO usuarios (nombre, email, password, rol)
            VALUES ('$nombre', '$email', '$password', 'usuario')";

    if ($conn->query($sql)) {
        echo "<h3 style='color:green;'>✅ Usuario registrado correctamente</h3>";
        echo "<a href='../html/login.html'>➡ Iniciar sesión</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
