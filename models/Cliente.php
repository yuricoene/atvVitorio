<?php
// Arquivo: models/Cliente.php
class Cliente {
    public $id;
    public $nome;
    public $cpf;

    public function __construct($nome, $cpf, $id = null) {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->id = $id;
    }
}
