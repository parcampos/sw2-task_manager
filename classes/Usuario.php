<?php
require_once 'Database.php';

class Usuario {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function register($nome, $email, $senha) {
        $senhaHash = md5($senha);
        $this->db->query('INSERT INTO Usuarios (Nome, Email, Senha) VALUES (:nome, :email, :senha)');
        $this->db->bind(':nome', $nome);
        $this->db->bind(':email', $email);
        $this->db->bind(':senha', $senhaHash);
        return $this->db->execute();
    }

    public function login($email, $senha) {
        $senhaHash = md5($senha);
        $this->db->query('SELECT UsuarioID FROM Usuarios WHERE Email = :email AND Senha = :senha');
        $this->db->bind(':email', $email);
        $this->db->bind(':senha', $senhaHash);
        $row = $this->db->single();
        return $row ? $row['UsuarioID'] : false;
    }
}
?>
