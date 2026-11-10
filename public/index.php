<?php
// Arquivo: public/index.php
// Este é o Front Controller da aplicação. Todas as requisições passam por aqui.

require_once '../controllers/ClienteController.php';
require_once '../controllers/CarrinhoController.php';
require_once '../controllers/RelatorioController.php';

$action = $_GET['action'] ?? 'home';

echo "<!DOCTYPE html>";
echo "<html lang='pt-BR'>";
echo "<head>";
echo "    <meta charset='UTF-8'>";
echo "    <title>Sistema PDV MVC</title>";
echo "    <style>body { font-family: Arial, sans-serif; margin: 40px; } form { margin-top: 20px; } nav { margin-bottom: 20px; }</style>";
echo "</head>";
echo "<body>";
echo "<nav><a href='?action=home'>Início</a> | <a href='?action=clientes'>Lista de Clientes</a> | <a href='?action=cliente_cadastrar'>Novo Cliente</a></nav>";
echo "<hr>";

switch ($action) {
    case 'cliente_cadastrar':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $controller = new ClienteController();
                $controller->cadastrar($_POST['nome'], $_POST['cpf']);
                echo "<p style='color: green;'>Cliente cadastrado com sucesso!</p>";
            } catch (Exception $e) {
                echo "<p style='color: red;'>Erro ao cadastrar: (Verifique a configuração do banco)</p>";
            }
        } else {
            echo "<h2>Cadastrar Cliente</h2>";
            echo "<form method='POST'>
                    <label>Nome:</label><br> <input type='text' name='nome' required><br><br>
                    <label>CPF:</label><br> <input type='text' name='cpf' required><br><br>
                    <button type='submit'>Salvar Cliente</button>
                  </form>";
        }
        break;

    case 'clientes':
        echo "<h2>Clientes Cadastrados</h2>";
        try {
            $controller = new ClienteController();
            $clientes = $controller->listar();
            
            if(count($clientes) > 0) {
                echo "<ul>";
                foreach ($clientes as $c) {
                    echo "<li>" . htmlspecialchars($c['nome']) . " - CPF: " . htmlspecialchars($c['cpf']) . "</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>Nenhum cliente encontrado.</p>";
            }
        } catch (Exception $e) {
            echo "<p style='color: red;'>Erro de conexão com o banco. Configure o arquivo config/Database.php e rode os scripts SQL.</p>";
        }
        break;

    case 'home':
    default:
        echo "<h1>Bem-vindo ao Sistema de Ponto de Venda (MVC)</h1>";
        echo "<p>Utilize o menu acima para navegar pelas opções do sistema.</p>";
        echo "<p><i>Lembre-se de configurar suas credenciais do MySQL/PostgreSQL em <code>config/Database.php</code>!</i></p>";
        break;
}

echo "</body>";
echo "</html>";
?>