<?php
        require "../conexao.php";
        session_start();
            if (isset($_POST['CPF']))
        {
            $CPF_funcionario = $_SESSION['CPF_funcionario'];
            $CPF = $_POST['CPF'];
            $_SESSION['CPF'] = $CPF;
            $ID_livro = $_POST['ID_livro'];
            $_SESSION['ID_livro'] = $_POST['ID_livro'];
            $data_ = date("y-m-d");
            $Data_prevista = date("y-m-d",strtotime("+7 days"));
            CriarEmprestimo($CPF, $CPF_funcionario,$ID_livro,$data_,$Data_prevista);
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

    <div class="forms"><!--formulário de emprestimo-->
        <form method="POST">
        <ul>
            <h1>Realizar empréstimo </h1>
            <hr>
            <li><a>CPF do cliente:</a><input type="number" name="CPF" placeholder="insira no formato(11122233345)"></li>
            <li><a>ID do livro:</a><input type="number" name="ID_livro" placeholder="ID do livro"></li>
            <li><a></a></li>
            <li><input type="submit"><input type="reset"></li>
    </ul>
        </form>
    </div>
</body>
</html>