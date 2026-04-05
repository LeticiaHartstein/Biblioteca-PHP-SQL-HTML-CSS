<?php
    require "../conexao.php";
    session_start();
    echo "<br>" .$_SESSION['CPF_funcionario'];
            if(isset($_POST['nome_cliente']))
                {
                    $CPF = $_SESSION['CPF'];
                    $CPF_funcionario = $_SESSION['CPF_funcionario'];
                    $nome_cliente = $_POST['nome_cliente'];
                    $email_cliente = $_POST['email_cliente'];
                    $telefone_cliente = $_POST['telefone_cliente'];
                    $resultado = CadastrarCliente($CPF,$nome_cliente,$email_cliente, $telefone_cliente );
                       if ($resultado == "existe")
                     {
                    echo "cadastro já existe";
                      }
                }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style.css">
    <title>Sistema de biblioteca</title>
</head>
<body>
    <div class="NavBar"> <!--Barra de navegação-->
        <ul>
            <li><a href="../Consultar_livro.php">Procurar livro</a></li>
            <li><a href="Cadastrar_livro.php">Cadastrar livro</a></li>
            <li><a href="LogIn.php">Empréstimo de livro</a></li>
        </ul>
    </div>
    <div class="forms"><!--formulário de cadastro de usuario-->
        <form method="POST">
            <ul>
                 <h1>Novo cadastro </h1>
                    <hr>
                <li><a>insira o nome: </a><input type="text" name="nome_cliente" placeholder="nome" required></li>
                <li><a>insira o email:</a><input type="email" name="email_cliente" placeholder="email" required></li>
                <li><a>insira o telefone</a><input tyep="text" name="telefone_cliente" placeholder="insira o telefone no formato(111222333)" required></li>
                <li><input type="submit"><input type="reset"></li>
            </ul>
        </form> 

    </div>
    
</body>
</html>