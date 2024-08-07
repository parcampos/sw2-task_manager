<?php
session_start();

if (!isset($_SESSION['usuarioID'])) {
    header('Location: login.php');
    exit();
}

require '../classes/Tarefa.php';

$tarefa = new Tarefa();
$usuarioID = $_SESSION['usuarioID'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'create') {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $dataVencimento = $_POST['dataVencimento'];
    $prioridade = $_POST['prioridade'];
    $tarefa->create($usuarioID, $titulo, $descricao, $dataVencimento, $prioridade);
}

$tarefas = $tarefa->getAll($usuarioID);

require '../views/tarefas.php';
?>
