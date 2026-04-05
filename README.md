# Sistema de biblioteca usando: PHP , SQL , HTML , CSS
Sistema de biblioteca criado com PHP,HTML e SQL
<hr>
<h4>Índice</h4>
<h5>Planejando</h5>
<div style="display: flex;list-style: none;">
  <a href="#casoUso">Diagrama de caso de uso (UML)</a>
  <a href="#fluxograma">Fluxogramas</a>
  <a href="#Conceitual">Diagrama - Modelo conceitual (MER)</a>
  <a href="#Logico">Diagrama - Modelo lógico</a>
</div>
<h5>Código</h5>
<div style="display: flex;list-style: none;">
  <a href="#MySQL">MySQL</a>
  <a href="#PHP">PHP</a>
  <a href="#CSS">CSS</a>
</div>

<hr>
<h1 align="center">📝 Rascunho do sistema 📝</h1>
<h2 id="casoUso">✏️ Diagrama de Caso de Uso ✏️</h2>
<p>Aqui, temos de maneira simples o que o sistema faz :</p>
<table>
  <tr>
    <td><img src="https://raw.githubusercontent.com/LeticiaHartstein/Biblioteca-PHP-SQL-HTML-CSS/refs/heads/main/Fluxogramas%20e%20Diagramas/Driagrama-CasoDeUso-SistemaBiblioteca.svg"></td>
    <td><h3>Atores:</h3> 
      <p>Atores são as pessoas/sistemas que interagem com a biblioteca, neste caso temos dois, são eles: </p>
      <ul>
          <li>Usuário: Cliente da biblioteca</li>
          <li>Funcionario : É responsavel por operar o sistema</li>        
      </ul>
      <h3>Ações: </h3>
        <ul>
          <li>Consultar nome de livro</li>
          <li>Consultar disponibilidade de livro</li>
          <li>Pegar livro</li>
          <li>Devolver livro</li>
          <li><i>Cadastrar usuário (opcional) </i></li>
        </ul>
      <h3>Manter em mente:</h3>
      <p>Segundo o diagrama, o usuário deve ter uma conta para conseguir o empréstimo de um livro, se ele não tiver, será instruido a criar uma</p>
      <p>A ação de pegar um livro irá incluir a ação de verificar a disponibilidade do livro no sistema antes de continuar</p>
    </td>
  </tr>
</table>
<h2 id="#fluxograma">⚙️ Fluxograma - Mostrando lógica/processos ⚙️</h2>
<table align ="center">
  <tr>
    <td><h3>Processo descrito</h3></td>
    <td><h3>Fluxograma</h3></td>
    <td><h3>Explicação</h3></td>
  </tr>
  <tr>
    <td><h3>Log-in do funcionário</h3></td>
    <td><img src="https://raw.githubusercontent.com/LeticiaHartstein/Biblioteca-PHP-SQL-HTML-CSS/0a05fda4664c8c9df87c2cc24ed37bfd88ab59d9/Fluxogramas%20e%20Diagramas/Fluxograma-Biblioteca-Login.svg" alt="log-in - fluxo "></td>
    <td><p>O funcionário deve inserir seu CPF e a senha de sua conta, qual irão ser confirmados antes de dar maiores permissões para mudanças/processos</p></td>
  </tr>
  <tr>
    <td><h3>Cadastro de novos livros</h3></td>
    <td><img src="https://raw.githubusercontent.com/LeticiaHartstein/Biblioteca-PHP-SQL-HTML-CSS/39045fdc484ef6e519d73c7f2b85bf9581345709/Fluxogramas%20e%20Diagramas/Fluxograma-Biblioteca-adicionarLivro.svg" alt="Cadastro de livro - fluxo"></td>
    <td>Para adicionar um novo livro, as seguintes infromações são solicitadas: nome_livro; autor; editora; Caso não exista um livro com todas as informações iguais, um novo livro será adicionado ao banco de dados </td>
  </tr>
  <tr>
    <td><h3>Emprestimo de livros, criar novo cadastro (se necessário) <br><br></h3></td>
    <td><img src="https://raw.githubusercontent.com/LeticiaHartstein/Biblioteca-PHP-SQL-HTML-CSS/refs/heads/main/Fluxogramas%20e%20Diagramas/Fluxograma-Biblioteca-VerificarLivroCriarUsuarioEmprestar.svg" alt="Emprestimo, criar conta, disponibilidade de livro"></td>
    <td> 
      <ul>
        <li>Verifica a disponibilidade do livro</li>
        <li>Oferece a opção de aceitar "pegar"  o livro</li>
        <li>Verifica se usuário já tem cadastro(caso não tenha, é possivel criar uma conta)</li>
        <li>Certifica a existência de livro qual não foi devolvido(caso não tenha sido, o processo de empréstimo não prosegue) </li>
        <li>Emprestimo é feito</li>
      </ul> 
    </td>
  </tr>
</table>
<hr>
<h1> ✏️🗃️ Planejando a estrutura do banco de dados 🗃️✏️</h1>
<hr>
<h2 id="Conceitual">Diagrama - Modelo Conceitual</h2>
<p>Aqui defino de maneira simples as entidades, seus atributos e relações, demais informações podem ser entendidas pela cardinalidade </p>
<img src="https://raw.githubusercontent.com/LeticiaHartstein/Biblioteca-PHP-SQL-HTML-CSS/0a05fda4664c8c9df87c2cc24ed37bfd88ab59d9/Fluxogramas%20e%20Diagramas/ModeloConceitual-Biblioteca.svg" alt="modelo conceitual">
<table>
<thead>
<tr>
<th>Relacionamento</th>
<th>O que significa?</th>
</tr>
</thead>
<tbody>
<tr>
<td><strong>Funcionario → Usuario</strong> (Cadastra)</td>
<td>Um funcionário pode cadastrar <strong>vários</strong> usuários, mas cada usuário é registrado no sistema por <strong>um </strong> funcionário específico.</td>
</tr>
<tr>
<td><strong>Funcionario → Livro</strong> (Registra)</td>
<td>Um funcionário pode registrar <strong>muitos (N)</strong> livros no acervo. Cada livro é inserido por <strong>um </strong> funcionário.</td>
</tr>
<tr>
<td><strong>Usuario → Emprestimo</strong></td>
<td>Um usuário pode realizar <strong>vários</strong> empréstimos ao longo do tempo (ou nenhum). Mas cada registro de empréstimo pertence a apenas <strong>um </strong> usuário.</td>
</tr>
<tr>
<td><strong>Livro → Emprestimo</strong></td>
<td>Um livro pode estar em <strong>vários</strong> registros de empréstimo (um por vez, historicamente). Cada empréstimo individual refere-se a apenas <strong>um </strong> livro.</td>
</tr>
<tr>
<td><strong>Funcionario → Emprestimo</strong> (Registra)</td>
<td>O funcionário pode registrar <strong>diversos </strong> empréstimos, mas cada transação de empréstimo é processada por exatamente <strong>um </strong> funcionário.</td>
</tr>
</tbody>
</table>
<h2 id="Logico"> Diagrama - Modelo Lógico </h2>
<p>Aqui, adiciono mais informações especificas sobre cada váriavel(seus tipos, se são chaves estrangeiras, tamanho ,etc ...), atribuimos o nome dos método qual nossas entidades serão encarregadas de fazer, assim, polindo o projeto antes de passar para o MySQL e PHP</p>
<img src="https://raw.githubusercontent.com/LeticiaHartstein/Biblioteca-PHP-SQL-HTML-CSS/2992d006a4cf14f2cda6ff7f0f5c387ad5c31e71/Fluxogramas%20e%20Diagramas/Diagrama-ModeloLogico-Biblioteca.svg" alt="modelo lógico">
<table>
<thead>
<tr>
<th>Tabela</th>
<th>Atributos (Campos e Tipos)</th>
<th>Chaves (PK/FK)</th>
<th>Métodos (Funções)</th>
</tr>
</thead>
<tbody>
<tr>
<td><strong>Usuário</strong></td>
<td>nome_cliente (VARCHAR), email_cliente (VARCHAR), telefone_cliente</td>
<td><strong>PK:</strong> CPF


<strong>FK:</strong> CPF_funcionario</td>
<td>PegarEmprestimoLivro(), Devolucao()</td>
</tr>
<tr>
<td><strong>Funcionario</strong></td>
<td>senha (VARCHAR)</td>
<td><strong>PK:</strong> CPF_funcionario</td>
<td>CadastrarCliente(), CadastrarLivro(), CriarEmprestimo()</td>
</tr>
<tr>
<td><strong>Livro</strong></td>
<td>nome_livro (VARCHAR), autor (VARCHAR), editora (VARCHAR), disponivel (BOOL)</td>
<td><strong>PK:</strong> ID_livro


<strong>FK:</strong> CPF_funcionario</td>
<td>-</td>
</tr>
<tr>
<td><strong>Emprestimo</strong></td>
<td>Data (DATE), Data_prevista (DATE), Devolvido (BOOL)</td>
<td><strong>PK:</strong> ID_emprestimo


<strong>FK:</strong> CPF, CPF_funcionario, ID_livro</td>
<td>MudarDisponibilidadeLivro()</td>
</tr>
</tbody>
</table>
<hr>
<h1>🖥️ Códigos 🖥️</h1>
<h2 id="MySQL">MySQL</h2>

<a href=""> Veja o arquivo no github </a>

```sql
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
	nome_cliente varchar(50) NOT NULL,
    email_cliente varchar(50) NOT NULL,
    telefone_cliente varchar(9) NOT NULL
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
INSERT INTO Funcionario(CPF_funcionario, senha) VALUES ("11122233345", "1234"); /*adicionando o primeiro funcionário para conseguir fazer log-in*/
```
<hr>
<h2 id="PHP">PHP</h2>
<h3>Arquivo conexao</h3>
<p>responsavel por todas as verificações/mudanças no banco de dados</p>

```php
<?php 
function conectarBd ()
{
   static $pdo;
   if (!$pdo)
    {
        $info ="mysql:host=localhost;dbname=Biblioteca;charset=utf8mb4"; 
        $pdo = new PDO( $info , "root", ""); /*Criando a conexão*/
    }
        return $pdo;
}
/**Insere dados */
function CadastrarLivro($nome_livro, $autor, $editora) /**Cadastro de livros, as informações que são armazenadas primeiro são recebidas do Consultar_livro.php */
{
    $db = conectarBd();
        $novo_cadastro_livro = [':nome_livro'=>$nome_livro,':autor'=>$autor, ':editora'=> $editora, ':disponivel' => 1 ]; 

        $sql="INSERT INTO livro(nome_livro,editora,autor,disponivel) VALUES (:nome_livro, :editora, :autor , :disponivel)";

        $db->prepare($sql)->execute($novo_cadastro_livro);
}

function CadastrarCliente($CPF, $nome_cliente, $email_cliente, $telefone_cliente) /**Função para fazer o cadastro de clientes */
{
    $db = conectarBd();

    $novo_cliente_usuario = [":CPF" => $CPF, ":nome_cliente" => $nome_cliente, ":email_cliente" => $email_cliente, ":telefone_cliente" => $telefone_cliente];
    $sql_consulta = "SELECT*FROM usuario WHERE CPF = :CPF";
    $existencia = $db ->prepare($sql_consulta)-> execute([":CPF" => $CPF]);
    if (empty($existencia))
    {
    $sql = "INSERT INTO usuario(CPF,nome_cliente,email_cliente,telefone_cliente) VALUES (:CPF, :nome_cliente, :email_cliente, :telefone_cliente)"; 

    $db->prepare($sql)->execute($novo_cliente_usuario);
    }
    else 
    {
        return "existe";
    }
}
function Devolver($CPF,$ID_livro, $devolvido)
{
    $bd = conectarBd();
    
    if ($devolvido = "1")
    {
        $sql = "UPDATE emprestimo SET Devolvido = 1 WHERE ID_livro = :ID_livro and CPF = :CPF and Devolvido = 0 ";
        return $bd -> prepare($sql) -> execute([":ID_livro"=>$ID_livro, ":CPF" => $CPF]);

        $sql_livro = "UPDATE livro SET disponivel = 1 WHERE ID_livro = :ID_livro ";

         $bd -> prepare($sql_livro) -> execute([":ID_livro"=>$ID_livro]);
    }
    
}
/**Consulta no banco de dados */
function ConsultarLivro($nome_livro) 
{
    $db = conectarBd();

    $sql = "SELECT ID_livro,editora,autor,disponivel FROM livro WHERE nome_livro LIKE :nome_livro ";

    $resultado = $db -> prepare($sql);
    $pesquisa = "%".$nome_livro."%"; /**adicionando %% antes e depois do nome do livro, para que possa ser usado na hora da pesquisa no banco de dados  */


    /**pesquisa por query por ser mais simples e fácil de passar para outros bancos de dados, não é recomendado para projetos maiores  */
    $resultado->bindParam(":nome_livro",$pesquisa, PDO::PARAM_STR); /**Substituindo o :nome_livro(qual não tem efeito) usado no $sql pelo nome inserido mais as alterações feitas no pesquisar */
    $resultado->execute();
    return $resultado->fetchALL(PDO::FETCH_ASSOC);/**retorna o resultado da pesquisa */
   
}
/*Log In do funcionario**/
function LogIn($CPF_funcionario, $senha)
{
    $db = conectarBd();

    $sql ="SELECT*FROM funcionario WHERE CPF_funcionario = :CPF_funcionario and senha = :senha";

    $resultado = $db -> prepare($sql);
    $resultado-> execute([":CPF_funcionario"=>$CPF_funcionario, ":senha" => $senha]);

    return $resultado->fetchALL(PDO::FETCH_ASSOC); /**retorna o resultado da pesquisa */

}
/**Criar empréstimos - verifica se cliente é cadastrado, verifica se tem um emprestimo sem devolução, cria o empréstimo */
function CriarEmprestimo( $CPF ,$CPF_funcionario,$ID_livro,$data_, $Data_prevista)
{
    $db = conectarBd();
    /**Pesquisar se o usuário existe */
    $sql_consulta ="SELECT CPF FROM usuario WHERE CPF = :CPF";
    $resultado_consulta_user = $db -> prepare($sql_consulta);
    $resultado_consulta_user-> execute([":CPF" => $CPF]); 

    if (!$resultado_consulta_user->fetch()) 
        {
         header ("Location: Cadastrar_cliente.php"); /**redireciona para página de cadastros */
         exit;
        }
    /**se o cliente não tiver emprestimo pendente, prosseguir para adicionar o emprestimo dele no sistema */
      $sql_consulta_emprestimo  ="SELECT * FROM emprestimo WHERE CPF = :CPF and Devolvido =0";
        $resultado_consulta_emprestimo = $db -> prepare($sql_consulta_emprestimo);
        $resultado_consulta_emprestimo -> execute([":CPF" => $CPF]);


    if ($resultado_consulta_emprestimo->fetch())
        {
            header ("Location: Devolver_livro.php"); 
            exit;
        }
    else
        {
            $emprestimo_info = [ ":CPF"=> $CPF,":CPF_funcionario"=> $CPF_funcionario, ":ID_livro" => $ID_livro,":data_"=> $data_ , ":Data_prevista" => $Data_prevista, ":Devolvido" => 0];

             $sql = "INSERT INTO emprestimo(CPF, CPF_funcionario, ID_livro, data_, Data_prevista, Devolvido) VALUES (:CPF, :CPF_funcionario, :ID_livro, :data_, :Data_prevista, :Devolvido)";
             $db -> prepare($sql) -> execute($emprestimo_info);

             $sql_livro ="UPDATE livro SET disponivel = 0 WHERE ID_livro = :ID_livro";

             $db -> prepare($sql_livro) -> execute([":ID_livro"=>$ID_livro]);
                
            exit;
        }
        
       
}
?>

````

<h3>Conexão com MySQL</h3>
<p>Toda feita por este trecho:</p>
<pre>function conectarBd ()
{
   static $pdo;
   if (!$pdo)
    {
        $info ="mysql:host=localhost;dbname=Biblioteca;charset=utf8mb4"; 
        $pdo = new PDO( $info , "root", ""); /*Criando a conexão*/
    }
        return $pdo;
}</pre>
<p>Todos os demais arquivos apenas passam as informações: </p>
<ul>
	<li><a href="https://github.com/LeticiaHartstein/Biblioteca-PHP-SQL-HTML-CSS/blob/main/Consultar_livro.php">Consultar_livro.php</a></li>
	<li><a heref="https://github.com/LeticiaHartstein/Biblioteca-PHP-SQL-HTML-CSS/blob/main/Paginas/Cadastrar_cliente.php">Paginas/Cadastrar_cliente.php</a></li>
	<li><a href="https://github.com/LeticiaHartstein/Biblioteca-PHP-SQL-HTML-CSS/blob/main/Paginas/Cadastrar_livro.php">Paginas/Cadastrar_livro.php</a></li>
	<li><a href="Paginas/Devolver_livro.php">Paginas/Devolver_livro.php</a></li>
	<li><a href="https://github.com/LeticiaHartstein/Biblioteca-PHP-SQL-HTML-CSS/blob/main/Paginas/Emprestimo.php">Paginas/Emprestimo.php</a></li>

</ul>
<h2 id="CSS">CSS</h2>
<p>Fiz o uso de apenas um style, com ajuda de ia o melhorei e fiz alguns outros ajustes a mão</p>
<p>O style só tem duas classes, sendo elas <i>NavBar</i> e <i>forms</i></p>

```CSS
body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
    font-family: Arial;
}

.NavBar ul {
    /* Layout e Posicionamento */
    display: flex;
    justify-content: center;
    gap: 30px;
    position: fixed;
    top: 20px; 
    left: 50%;
    transform: translateX(-50%);
    width: fit-content;
    margin: 0;
    padding: 12px 40px;
    background: rgba(255, 255, 255, 0.8); 
    backdrop-filter: blur(10px); 
    -webkit-backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 50px; 
    list-style: none;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    z-index: 1000;
}
/* Estilo para os links */
.NavBar ul li a {
    text-decoration: none;
    color: #333;
    font-family: sans-serif;
    font-weight: 500;
    transition: color 0.3s ease;
}
/*quando o usuario passar o mouse por cima*/
.NavBar ul li a:hover 
 {
    color: #007AFF; 
}
/* Container do Formulário */
.forms form ul {
    list-style: none;
    padding: 40px;
    background: #ffffff; /* Fundo sólido para contraste */
    border: 1px solid #e0e0e0; /* Borda quase imperceptível */
    border-radius: 24px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05); /* Sombra suave e ampla */
    
    max-width: 450px; 
    margin: 50px auto;
    display: flex;
    flex-direction: column;
    gap: 20px; /* Controla o espaço entre os campos */
}

/* campos */
.forms form ul li 
{
    padding: 0;
}

/* Estilo dos Inputs de Texto/Senha */
.forms form ul li input:not(input[type="reset"], input[type="submit"]) {
    width: 100%;
    padding: 12px 16px;
    border: 1.5px solid #eee;
    border-radius: 12px;
    font-size: 16px;
    transition: all 0.3s ease;
    box-sizing: border-box; /* Garante que o padding não quebre a largura */
}

.forms form ul li input:focus {
    outline: none;
    border-color: #007AFF;
    box-shadow: 0 0 0 4px rgba(0, 122, 255, 0.1);
}

/* Estilo dos Botões (Submit e Reset) */
.forms form ul li input[type="submit"],
.forms form ul li input[type="reset"] {
    cursor: pointer;
    padding: 12px 24px;
    border-radius: 12px;
    font-weight: 600;
    border: none;
    transition: transform 0.2s active, background 0.3s;
    margin-top: 10px;
}

.forms form ul li input[type="submit"] {
    background-color: #007AFF;
    color: white;
}

.forms form ul li input[type="reset"] {
    background-color: #f2f2f7;
    color: #333;
    margin-left: 10px;
}

/* Hover dos Botões */
.forms form ul li input[type="submit"]:hover {
    background-color: #0056b3;
    box-shadow: 0 4px 12px rgba(0, 122, 255, 0.3);
}

.forms form ul li input[type="reset"]:hover {
    background-color: #e5e5ea;
}

```
