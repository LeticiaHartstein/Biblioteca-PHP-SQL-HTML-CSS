<?php
    require "../conexao.php";
    session_start();
         if(isset($_POST['CPF_funcionario']))
            {
                    $senha = $_POST['senha'];
                    $CPF_funcionario = $_POST['CPF_funcionario'];
                    $_SESSION['CPF_funcionario'] = $CPF_funcionario;

                    $resultado = LogIn($CPF_funcionario, $senha);
            }
        

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style.css">
    <title> Sistema de biblioteca </title>
</head>

<body>
    
    <div class="NavBar"> <!--Barra de navegação-->
        <ul>
            <li><a href="../Consultar_livro.php">Procurar livro</a></li>
            <li><a href="Cadastrar_livro.php">Cadastrar livro</a></li>
            <li><a href="LogIn.php">Empréstimo de livro</a></li>
        </ul>
    </div>
    <div class="forms"> <!--Classe para o formulário -->
        <form method="POST"> <!--A ação de enviar está sendo feita por: -->
            <ul>
                <h1>Log in</h1>
                <hr>
                <li><a> Insira seu CPF:<input type="number" name="CPF_funcionario" placeholder="insira no formato(11122233345)" required></a></li>
                <li><a>Insira a sua senha:<input type="password" name="senha" placeholder="senha" required></a></li>
                <li><input type="submit"><input type="reset"></li>
            </ul>
        </form>
            <?php
                 if(!empty($resultado))
                    {
                            header("Location: Emprestimo.php");
                            exit(); 
                    }
            ?>
    </div>
</body>
</html>