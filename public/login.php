<?php
session_start();
require '../classes/Usuario.php';

if (isset($_SESSION['usuarioID'])) {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    $usuario = new Usuario();
    $usuarioID = $usuario->login($email, $senha);
    
    if ($usuarioID) {
        $_SESSION['usuarioID'] = $usuarioID;
        header('Location: index.php');
        exit();
    } else {
        $error = "Email ou senha incorretos.";
    }
}

require '../views/login.php';
?>
