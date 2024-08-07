<?php
session_start();
require '../classes/Usuario.php';

if (isset($_SESSION['usuarioID'])) {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    $usuario = new Usuario();
    $usuario->register($nome, $email, $senha);
    
    header('Location: login.php');
    exit();
}

require '../views/register.php';
?>
