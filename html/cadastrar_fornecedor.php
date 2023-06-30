<?php

// Inclui o arquivo com a conexão
include("C:\\xampp\\htdocs\\ControleFornecedor\\dbconnection\\mysql_connection.php");

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
	<title>Cadastrar Fornecedor</title>
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
          <div class="col-sm-12 col-md-6">
            <?php
                if (isset($_GET['msg'])) {
                  $msg = $_GET['msg'];
                if ($msg == 'success') {
                  echo '<p class="text-success">Fornecedor cadastrado com sucesso</p>';
                }
              }
              ?>
            <h1>Cadastro de Fornecedores</h1>
            <form action="../repositorio/fornecedor_repositorio.php" method="post">
                <div class="row mb-2">
                  <label class="col-sm-2 col-form-label">Nome do fornecedor:</label>
                  <div class="col-sm-10">
                    <input required maxlength="90" type="text" class="form-control" name="nome_fornecedor">
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Situação:</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="situacao">
                      <option value="1">Ativo</option>
                      <option value="0">Inativo</option>
                    </select>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary" formmethod="post" formaction="../repositorio/fornecedor_repositorio.php">Cadastrar Fornecedor</button>
              </form>
          </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>