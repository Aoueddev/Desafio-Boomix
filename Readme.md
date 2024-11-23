# Instruções para usar o código

### Passo 1: Fazer o Fork do Repositório

1. Faça um **fork** do repositório para a sua conta no GitHub.

### Passo 2: Mudar a Porta do Servidor MySQL

Após fazer o fork, você precisa mudar a porta do servidor SQL para **3360**. Para isso, siga as etapas abaixo:

1. Abra o painel de controle do **XAMPP** ou o seu servidor MySQL local.
2. Clique em **Config** no MySQL e depois em **my.ini**.
3. Encontre a linha que define a porta do MySQL (geralmente `port=3306`) e altere para:

    ```ini
    port=3360
    ```

4. Salve as alterações e reinicie o MySQL no painel do XAMPP.

### Passo 3: Configuração do Banco de Dados

1. Abra o MySQL no seu navegador (`http://localhost/phpmyadmin`).
2. Crie um banco de dados com o nome **todolist**.
3. Importe as tabelas necessárias para o banco de dados. Caso o repositório forneça um arquivo SQL de criação de tabelas, importe-o.

### Passo 4: Alterar as Configurações de Conexão com o Banco de Dados

No diretório do projeto, localize o arquivo `db/database.php` e altere a configuração de conexão com o banco de dados para refletir a nova porta configurada (`3360`).