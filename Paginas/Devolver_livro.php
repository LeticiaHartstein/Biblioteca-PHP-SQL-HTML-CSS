<?php
        require "../conexao.php";
        session_start();
        if (isset($_POST['check']))
            {
                $check = $_POST['check'];
                Devolver($_SESSION['CPF'], $_SESSION['ID_livro'], $check);
                header ("Location: Emprestimo.php");
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
    <div class="forms">
        <form method="POST">
            <ul>
                <label for="check">O livro foi devolvido?</label>
                <input type="checkbox" name="check" value="1">
                <li><input type="submit"><input type="reset"></li>
            </ul>
        </form>
    </div>
</body>
</html>