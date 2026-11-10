# POP - Procedimento Operacional Padrão: Implantação do Sistema PDV em PHP

**Objetivo:** Padronizar as etapas de configuração e execução do Sistema PDV no ambiente de servidor web.

### Pré-requisitos
1. Servidor web com suporte a PHP instalado (Apache ou Nginx). Recomenda-se XAMPP, WAMP ou LAMP.
2. PHP versão 8.0 ou superior.
3. Extensão PDO (PDO_MYSQL, PDO_PGSQL ou PDO_SQLSRV) habilitada.
4. Servidor de Banco de Dados rodando localmente (porta 3306 para MySQL/MariaDB).

### Etapa 1: Configuração do Banco de Dados
1. Acesse o gerenciador do banco (ex: phpMyAdmin ou DBeaver).
2. Crie um banco de dados chamado `pdv_db`.
3. Execute o script SQL de criação das tabelas fornecido no pacote original (`database/schema.sql`).

### Etapa 2: Instalação e Configuração do Projeto
1. Extraia o ZIP no diretório público do seu servidor web (ex: `htdocs` no XAMPP).
2. Abra o arquivo `config/Database.php` no seu editor de código.
3. Ajuste a string de conexão do PDO para refletir o usuário e a senha do seu banco de dados local.

### Etapa 3: Execução e Validação
1. Inicie os serviços do Apache e do Banco de Dados.
2. Abra o navegador web e acesse a URL: `http://localhost/pdv-php/` (ou nome da pasta extraída).
3. O sistema está homologado para uso.
