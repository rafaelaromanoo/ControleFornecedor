<?php
// Inclui o arquivo com a conexão
include("C:\\xampp\\htdocs\\ControleFornecedor\\dbconnection\\mysql_connection.php");

// Verifica se os dados foram enviados via método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os valores enviados pelo formulário
    $nome_fornecedor = $_POST["nome_fornecedor"];
    $situacao = $_POST["situacao"];

    // Prepara a consulta SQL para inserção dos dados
    $sql = "INSERT INTO fornecedor (nome_fornecedor, situacao) VALUES ('$nome_fornecedor', '$situacao')";

    if ($conection->query($sql) === TRUE) {
        // Redireciona de volta para a página do formulário após a inserção
        $_SESSION['status'] = 'success';
        header("Location: ../html/cadastrar_fornecedor.php");
        exit();
    } else {
        // Redireciona de volta para a página do formulário após a inserção
        $_SESSION['status'] = 'error';
        header("Location: ../html/cadastrar_fornecedor.php");
        exit();
    }
}

// Fecha a conexão com o banco de dados
$conection->close();
?>