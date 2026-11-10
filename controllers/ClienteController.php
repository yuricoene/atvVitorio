<?php
// Arquivo: controllers/ClienteController.php
require_once '../dao/ClienteDAO.php';
require_once '../models/Cliente.php';

class ClienteController {
    private $clienteDAO;

    public function __construct() {
        $this->clienteDAO = new ClienteDAO();
    }

    public function cadastrar($nome, $cpf) {
        $cliente = new Cliente($nome, $cpf);
        $this->clienteDAO->salvar($cliente);
    }

    public function listar() {
        return $this->clienteDAO->listarTodos();
    }
}
?>