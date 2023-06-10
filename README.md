# Inicializando o projeto
### `Utilização`

A utilização deste código é para encurtar URLs e redirecionar para a URL desejada, estando encurtada. É necessário ter um domínio e um provedor de hospedagem, como por exemplo AWS, Azure, Cpanel, etc. Não entrarei em detalhes sobre isso no momento.

### `Banco de Dados`

O banco de dados utilizado na aplicação é o MySQL. É necessário criar a tabela no banco de dados de sua preferência.
### `Exemplo de criação do banco de dados`

No MySQL, utilizamos o seguinte comando para criar o banco de dados:

CREATE DATABASE meubanco;
Após criar o banco, devemos criar a tabela e seus campos para preenchê-los:

CREATE TABLE urls (
id_url INT AUTO_INCREMENT,
original_url VARCHAR(255),
shortened_url VARCHAR(55),
custom_url VARCHAR(55),
expiration_date DATETIME,
PRIMARY KEY (id_url)
);
Após executar os comandos corretamente, você poderá verificar que o banco, a tabela e seus campos foram criados. Observação: os nomes devem ser exatamente iguais, para evitar conflitos no código.

### `Feedback`

Foi divertido criar este código e aprendi muito para me desenvolver como profissional.

Observação: Obviamente, as configurações não devem ficar na mesma pasta do projeto por questões de segurança. Deve ser criada uma pasta de configuração que não seja indexada, e lá dentro você pode colocar a pasta de conexão.

### `Futuros updates`

Em breve, hospedarei o código e ensinarei como você também pode fazer isso.
