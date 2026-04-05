<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style.css"><!-- ../ para acessar o arquivo em uma pasta antes desta-->
    <title> Sistema da biblioteca</title>
</head>
<body>
    <div class="NavBar"> <!--Barra de navegação-->
        <ul>
            <li><a href="Consultar_livro.php">Procurar livro</a></li>
            <li><a href="Paginas/Cadastrar_livro.php">Cadastrar livro</a></li>
            <li><a href="Paginas/LogIn.php">Empréstimo de livro</a></li>
        </ul>

        <?php
        require "conexao.php";
        $relatorio = [];
        if (isset($_POST['nome_livro']))
        {
            $nome_livro = $_POST['nome_livro'];
            $relatorio = ConsultarLivro($nome_livro);
        }
    
        ?>
    </div>
    <div class="forms">
        <form method="POST">
            <ul>
                <h1>Procurar livro</h1>
                <hr>
                <li><a>Nome do livro: </a><input type="text" name="nome_livro" placeholder="nome" required></li>
                <li><input type="submit"><input type="reset"></li>
            </ul>
        </form>
    <?php
    
            if (!empty($relatorio)) /**Verificando se algum livro foi encontrado  */
            {
            foreach ($relatorio as $livro) /**pegando cada informação do relatório livro */
                {
            echo "<ul style='list-style:none;'>";
            echo "<li><a>ID do livro: </a>" .$livro['ID_livro']. "<br></li>";
            echo "<li><a>Autor do livro: </a>" .$livro['autor'] . "<br></li>";
            echo "<li><a>Editora : </a>" . $livro['editora'] . "<br></li>";
                if ($livro['disponivel'] == 1) /**Status do livro */
                    {
                        echo "<li><a>Disponibilidade: </a> disponivel</li>";
                    }
                else 
                    {
                        echo "<li><a>Disponibilidade: </a> indisponivel</li>";
                    }
            }
            #aqui, grande parte do texto serve apenas para formatação! não há uso
            echo "</ul>";
            echo "<form>";
            echo "<ul>";
            echo "<li><a href='Paginas/Emprestimo.php'><input type='submit' value='Pegar livro' ></a></li>";
            echo "</ul>";
            echo "</form>";
            }
    
    ?>
    </div>
</body>
</html>