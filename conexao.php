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