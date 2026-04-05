CREATE database Biblioteca; /*Criando banco de dados */
USE Biblioteca; /*Usando o banco de dados*/
/*Criando a tabela de Funcionario, conforme o modelo lógico*/
create table Funcionario
(
	CPF_funcionario varchar(11) PRIMARY KEY, 
    senha varchar(50) NOT NULL /*Senha para a conta de funcionário(campo obrigatório)*/
);
/*Criando a tabela de usuario conforme o modelo lógico*/
create table Usuario
(
	CPF varchar(11) PRIMARY KEY,
    /*Campo para demais informações de usuario (todos devem ser preenchidos)*/
	CPF_funcionario varchar(11), /**FK*/
	nome_cliente varchar(50) NOT NULL,
    email_cliente varchar(50) NOT NULL,
    telefone_cliente varchar(9) NOT NULL,
	FOREIGN KEY (CPF_funcionario) references Funcionario(CPF_funcionario)

);
/*Criando a tabela para Livros conforme montado no modelo lógico*/
create table Livro 
(
	ID_livro INT(6) auto_increment PRIMARY KEY,
	nome_livro varchar(50) NOT NULL,
    editora varchar(50) NOT NULL,
    autor varchar(50),
	disponivel bool NOT NULL
);
/*Criando a tabela Emprestimo conforme o modelo lógico*/
create table Emprestimo 
(
	ID_emprestimo INT(6) auto_increment PRIMARY KEY, /*auto incrementar para criar o ID do emprestimo(não precisa ser digitado um por um)*/
    CPF varchar(11), /*FK*/
    CPF_funcionario varchar(11), /*FK*/
    ID_livro INT(6), /*FK*/
    data_  Date NOT NULL, /*colocar a data em que o livro foi retirado*/
    Data_prevista Date, /*previsão de data para devolução do livro*/
    Devolvido BOOL NOT NULL,
    /*parte de FK, colocando a referencia de valores para cada uma*/
    FOREIGN KEY (CPF) references Usuario(CPF),
    FOREIGN KEY (CPF_funcionario) references Funcionario(CPF_funcionario),
    FOREIGN KEY (ID_livro) references Livro(ID_livro)
    
);
INSERT INTO Funcionario(CPF_funcionario, senha) VALUES ("11122233345", "1234"); 
