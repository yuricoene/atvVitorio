<?php
// Arquivo: controllers/CarrinhoController.php
session_start();

class CarrinhoController {
    
    public function __construct() {
        if (!isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = [];
        }
    }

    public function adicionarItem($idProduto, $nome, $preco, $quantidade) {
        $item = [
            'id' => $idProduto,
            'nome' => $nome,
            'preco' => $preco,
            'quantidade' => $quantidade,
            'subtotal' => $preco * $quantidade
        ];
        $_SESSION['carrinho'][] = $item;
    }

    public function removerItem($indice) {
        if (isset($_SESSION['carrinho'][$indice])) {
            unset($_SESSION['carrinho'][$indice]);
            $_SESSION['carrinho'] = array_values($_SESSION['carrinho']);
        }
    }

    public function calcularTotal() {
        $total = 0;
        foreach ($_SESSION['carrinho'] as $item) {
            $total += $item['subtotal'];
        }
        return $total;
    }

    public function finalizarVenda($idCliente) {
        $_SESSION['carrinho'] = [];
    }
}
?>