
# Encurtador de URL

Este é um projeto simples para encurtar URLs. Ele permite que os usuários insiram uma URL longa e receba uma versão curta dela, que pode ser compartilhada com facilidade.

## Funcionalidades

- **Encurtar URL**: Permite que os usuários insiram URLs longas e obtenham uma versão curta.
- **Redirecionamento**: Quando um usuário acessa uma URL curta, é redirecionado para a URL original.
- **Informações sobre o link**: Os usuários podem visualizar algumas informações sobre o link encurtado que criam. Quantidade de acessos.

## Tecnologias Utilizadas
- [PHP](https://www.php.net/) - Linguagem de programação
- [MySQL](https://www.mysql.com/) - Banco de dados relacional


## Instalação

Siga os passos abaixo para configurar e rodar o projeto localmente:

1. **Clone o repositório**:

```bash
git clone https://github.com/EsdrasMeloSoares/URLShortener.git
```

2. **Criação do banco de dados**:

Para criar o banco de dados necessário para o projeto, execute o script abaixo:
```bash
php database/database.php
```

3. **Registrar as tabelas no banco de dados**
Após criar o banco de dados, registre as tabelas necessárias executando a migração:
```bash
php database/migration/urls.php
```