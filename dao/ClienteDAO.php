<?php
// Arquivo: dao/ClienteDAO.php
require_once '../config/Database.php';

class ClienteDAO {
    private $conn;

    public function __construct() {
        $this->conn = Database::getInstance()->getConnection();
    }

    public function salvar(Cliente $cliente) {
        $stmt = $this->conn->prepare("INSERT INTO clientes (nome, cpf) VALUES (:nome, :cpf)");
        $stmt->bindParam(':nome', $cliente->nome);
        $stmt->bindParam(':cpf', $cliente->cpf);
        return $stmt->execute();
    }

    public function listarTodos() {
        $stmt = $this->conn->query("SELECT * FROM clientes");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
