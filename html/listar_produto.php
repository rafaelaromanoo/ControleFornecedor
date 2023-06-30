<?php

// Inclui o arquivo com a conexão
include("C:\\xampp\\htdocs\\ControleFornecedor\\dbconnection\\mysql_connection.php");

// Consulta ao banco de dados
$sql = "SELECT id_produto, id_fornecedor, nome_produto, vlr_aquisicao, vlr_venda, situacao FROM Produto";
$result = $conection->query($sql);

if (isset($_GET['status']) && isset($_GET['msg'])){
  $status = $_GET['status'];
  $msg = $_GET['msg'];
} else if(isset($_GET['status']) && !isset($_GET['msg'])){
  $status = $_GET['status'];
}

?>

<!DOCTYPE html>
<html lang="pt_br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.html">ControleFornecedor</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Fornecedor
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="listar_fornecedor.php">Listar</a></li>
                <li><a class="dropdown-item" href="cadastrar_fornecedor.php">Cadastrar</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Produto
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="listar_produto.php">Listar</a></li>
                <li><a class="dropdown-item" href="cadastrar_produto.php">Cadastrar</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
<div class="container text-center">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <h1>Lista de Produtos</h1>
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">ID Produto</th>
                        <th scope="col">ID Fornecedor</th>
                        <th scope="col">Nome Produto</th>
                        <th scope="col">Valor Aquisição</th>
                        <th scope="col">Valor Venda</th>
                        <th scope="col">Situação</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        // Verifica se há resultados
                        if ($result->num_rows > 0) {
                            // Exibe os dados de cada linha encontrada
                            while ($row = $result->fetch_assoc()) {
                      ?>
                      <tr>
                        <th scope="row"><?php echo $row["id_produto"] ?></th>
                        <td><?php echo $row["id_fornecedor"] ?></td>
                        <td><?php echo $row["nome_produto"] ?></td>
                        <td><?php echo $row["vlr_aquisicao"] ?></td>
                        <td><?php echo $row["vlr_venda"] ?></td>
                        <td><?php echo $row["situacao"] ?></td>
                      </tr>

                      <?php
                            }
                        } else{
                      ?>
                        <tr>
                          <td colspan="5">Nenhum resultado encontrado.</td>
                        </tr>
                      <?php 
                        }
                        // Fecha a conexão com o banco de dados
                        $conection->close();
                      ?>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>