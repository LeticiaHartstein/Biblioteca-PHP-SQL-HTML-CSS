<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style.css"><!-- ../ para acessar o arquivo em uma pasta antes desta-->
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
</body>
    <?php
        require "../conexao.php";
        if (isset($_POST['nome_livro']) && ($_POST['autor'] && ($_POST['editora'])))
        {
        $nome_livro = $_POST["nome_livro"];
        $autor = $_POST["autor"];
        $editora = $_POST["editora"];

         CadastrarLivro($nome_livro, $autor, $editora);
        }
    ?>

    <div class="forms"> <!--Div do formulario de enviar-->
        <form method="POST">
            <ul>
                <h1>Cadastro de livro</h1>
                <hr>
                <li><a>Nome do livro:</a><input type="text" name="nome_livro" placeholder="nome do livro" required></li>
                <li><a>Autor do livro:</a><input type="text" name="autor" placeholder="nome do autor" required></li>
                <li><a>Editora do livro:</a><input type="text" name="editora" placeholder="nome da editora" required></li>
                <li><input type="submit"><input type="reset"></li>
            </ul>
        </form>
    </div>

</body>
    
</html>