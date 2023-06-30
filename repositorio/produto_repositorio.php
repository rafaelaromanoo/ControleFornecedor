<?php
// Inclui o arquivo com a conexão
include("C:\\xampp\\htdocs\\ControleFornecedor\\dbconnection\\mysql_connection.php");

// Verifica se os dados foram enviados via método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os valores enviados pelo formulário
    $nome_produto = $_POST["nome_produto"];
    $id_fornecedor = $_POST["id_fornecedor"];
    $vlr_aquisicao = $_POST["vlr_aquisicao"];
    $vlr_venda = $_POST["vlr_venda"];
    $situacao = $_POST["situacao"];

    // Prepara a consulta SQL para inserção dos dados
    $sql = "INSERT INTO Produto (id_fornecedor, nome_produto, vlr_aquisicao, vlr_venda, situacao)
                    VALUES ('$id_fornecedor','$nome_produto', '$vlr_aquisicao', '$vlr_venda', '$situacao')";

    $_SESSION['msg'] = "inseriu!";

    if ($conection->query($sql) === TRUE) {
        // Redireciona de volta para a página do formulário após a inserção
        $_SESSION['msg'] = 'Produto cadastrado com sucesso';
        $_SESSION['status'] = 'success';
        header("Location: ../html/cadastrar_produto.php");
        exit();
    } else {
        // Redireciona de volta para a página do formulário após a inserção
        $_SESSION['msg'] = 'Erro!';
        $_SESSION['status'] = 'error';
        header("Location: ../html/cadastrar_produto.php");
        exit();
    }
}

// Fecha a conexão com o banco de dados
$conection->close();
?>