<?php
require_once 'Database.php';

class Tarefa {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function create($usuarioID, $titulo, $descricao, $dataVencimento, $prioridade) {
        $this->db->query('INSERT INTO Tarefas (UsuarioID, Titulo, Descricao, DataCriacao, DataVencimento, Prioridade, Status) VALUES (:usuarioID, :titulo, :descricao, CURDATE(), :dataVencimento, :prioridade, "Pendente")');
        $this->db->bind(':usuarioID', $usuarioID);
        $this->db->bind(':titulo', $titulo);
        $this->db->bind(':descricao', $descricao);
        $this->db->bind(':dataVencimento', $dataVencimento);
        $this->db->bind(':prioridade', $prioridade);
        return $this->db->execute();
    }

    public function getAll($usuarioID) {
        $this->db->query('SELECT * FROM Tarefas WHERE UsuarioID = :usuarioID');
        $this->db->bind(':usuarioID', $usuarioID);
        return $this->db->resultset();
    }

    public function update($tarefaID, $usuarioID, $status, $dataVencimento) {
        $this->db->query('UPDATE Tarefas SET Status = :status, DataVencimento = :dataVencimento WHERE TarefaID = :tarefaID AND UsuarioID = :usuarioID');
        $this->db->bind(':status', $status);
        $this->db->bind(':dataVencimento', $dataVencimento);
        $this->db->bind(':tarefaID', $tarefaID);
        $this->db->bind(':usuarioID', $usuarioID);
        return $this->db->execute();
    }

    public function delete($tarefaID, $usuarioID) {
        $this->db->query('DELETE FROM Tarefas WHERE TarefaID = :tarefaID AND UsuarioID = :usuarioID');
        $this->db->bind(':tarefaID', $tarefaID);
        $this->db->bind(':usuarioID', $usuarioID);
        return $this->db->execute();
    }
}
?>
