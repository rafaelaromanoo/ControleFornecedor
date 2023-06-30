<?php

// Configurações do banco de dados
$server = "localhost";
$user = "root";
$password = "3390Rafa!";
$dbname = "portal_fornecedor";

// Conexão com o banco de dados
$conection = mysqli_connect($server, $user, $password, $dbname);

// Verifica se ocorreu algum erro na conexão
if ($conection->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conection->connect_error);
}

?>