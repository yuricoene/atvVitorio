# Sistema de Ponto de Venda (PDV) - PHP

Este projeto é um Sistema de Ponto de Venda (PDV) desenvolvido em **PHP**, refatorado para implementar boas práticas de engenharia de software, separação de responsabilidades e padrões de projeto.

## Arquitetura MVC
O projeto segue a arquitetura **Model-View-Controller (MVC)**:
- **Model:** Contém as entidades de negócio (ex: `Cliente`) e encapsula as regras.
- **View:** Arquivos `.php` e HTML de frontend (não incluídos no backend core).
- **Controller:** Recebem as interações, processam as regras usando os Models e DAOs.

## Design Patterns Adotados
1. **Singleton:** Implementado na classe `Database`. Garante que apenas uma instância da conexão PDO seja criada.
2. **DAO (Data Access Object):** Utilizado nas classes `ClienteDAO` e `VendaDAO` para isolar a camada de persistência.

## Funcionalidades (CRUDs)
- [x] Cadastro e Gestão de Clientes.
- [x] Carrinho de Vendas (Gerenciamento em sessão).
- [x] Relatórios de Vendas por período mensal.
