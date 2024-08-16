<?php
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
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = 'user'; // Por defecto, todos los nuevos usuarios son clientes

    // Para mayor seguridad, puedes usar prepared statements
    $stmt = $conn->prepare("INSERT INTO users (fullname, email, username, password, role) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $fullname, $email, $username, $password, $role);

    if ($stmt->execute()) {
        echo "Registro exitoso. Ahora puedes <a href='login.html'>iniciar sesión</a>";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
}

$conn->close();
?>
