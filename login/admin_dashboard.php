<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .welcome-message {
            font-size: 18px;
            color: gray;
        }
    </style>
</head>
<body>
    <h1>Bienvenido, Administrador</h1>
    <p class="welcome-message">Panel de control del administrador</p>
    <script>
        // Espera 3 segundos y redirige
        setTimeout(function() {
            window.location.href = '..index.html'; // Cambia esto a la página a la que deseas redirigir
        }, 3000); // 3000 milisegundos = 3 segundos
    </script>
</body>
</html>
