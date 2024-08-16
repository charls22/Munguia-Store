<?php
session_start();

// Conexión a la base de datos
$servername = "localhost";
$username = "u767323855_login";
$password = "22(Gore)22";
$dbname = "u767323855_munguia";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Para mayor seguridad, puedes usar prepared statements
    $stmt = $conn->prepare("SELECT username, role FROM users WHERE email=? AND password=?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($username, $role);
    $stmt->fetch();

    if ($stmt->num_rows == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;

        // Redirige a index.html que está en el directorio anterior
        header("Location: ../index.html");
        exit(); // Asegúrate de llamar a exit() después de header()
    } else {
        echo "Usuario no registrado o datos incorrectos";
    }
    
    $stmt->close();
}

$conn->close();
?>
