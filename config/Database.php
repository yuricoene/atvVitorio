<?php
// Arquivo: config/Database.php
// Conexão com SQLite (Singleton). O banco é um arquivo local, sem precisar de servidor.
 
class Database {
    private static $instance = null;
    private $conn;
 
    private function __construct() {
        try {
            $pasta = __DIR__ . '/../database';
            if (!is_dir($pasta)) {
                mkdir($pasta, 0777, true);
            }
 
            $this->conn = new PDO('sqlite:' . $pasta . '/pdv.sqlite');
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->conn->exec('PRAGMA foreign_keys = ON');
 
            $this->criarTabelas();
        } catch (PDOException $e) {
            die("Erro na conexão: " . $e->getMessage());
        }
    }
 
    // Cria as tabelas automaticamente na primeira execução
    private function criarTabelas() {
        $this->conn->exec("
            CREATE TABLE IF NOT EXISTS clientes (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                nome TEXT NOT NULL,
                cpf TEXT NOT NULL
            )
        ");
    }
 
    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }
 
    public function getConnection() {
        return $this->conn;
    }
}
?>
 