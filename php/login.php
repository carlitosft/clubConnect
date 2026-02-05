<?php
session_start();
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $password = $_POST["password"];

    // Buscar usuario por email
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows == 1) {

        $usuario = $resultado->fetch_assoc();

        // Verificar contraseña
        if (password_verify($password, $usuario["password"])) {

            // Guardar datos en sesión
            $_SESSION["id"] = $usuario["id"];
            $_SESSION["nombre"] = $usuario["nombre"];
            $_SESSION["email"] = $usuario["email"];

            // Redirigir al panel
            header("Location: ../html/dashboard.php");
            exit();

        } else {
            echo "❌ Contraseña incorrecta";
        }

    } else {
        echo "❌ Usuario no encontrado";
    }
}
?>
