<?php
session_start();
require '../classes/Tarefa.php';

if (!isset($_SESSION['usuarioID'])) {
    header('Location: login.php');
    exit();
}

$tarefa = new Tarefa();
$usuarioID = $_SESSION['usuarioID'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    switch ($action) {
        case 'create':
            $titulo = $_POST['titulo'];
            $descricao = $_POST['descricao'];
            $dataVencimento = $_POST['dataVencimento'];
            $prioridade = $_POST['prioridade'];
            $tarefa->create($usuarioID, $titulo, $descricao, $dataVencimento, $prioridade);
            break;
        
        case 'update':
            $tarefaID = $_POST['tarefaID'];
            $status = $_POST['status'];
            $dataVencimento = $_POST['dataVencimento'];
            $tarefa->update($tarefaID, $usuarioID, $status, $dataVencimento);
            break;
        
        case 'delete':
            $tarefaID = $_POST['tarefaID'];
            $tarefa->delete($tarefaID, $usuarioID);
            break;
    }
}

$tarefas = $tarefa->getAll($usuarioID);

require '../views/tarefas.php';
?>
