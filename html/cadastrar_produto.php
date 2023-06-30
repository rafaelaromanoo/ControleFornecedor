<?php
session_start();

if(isset($_SESSION['status']))
{
    ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Hey !</strong> <?= $_SESSION['status']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php 
    unset($_SESSION['status']);
}


// Inclui o arquivo com a conexão
include("C:\\xampp\\htdocs\\ControleFornecedor\\dbconnection\\mysql_connection.php");

// Consulta ao banco de dados
$sql = "SELECT id_fornecedor, nome_fornecedor FROM Fornecedor";
$result = $conection->query($sql);
?>

<!DOCTYPE html>
<html lang="pt_br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastrar Produto</title>
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
            <h1>Cadastro de Produtos</h1>
            <form action="../repositorio/cadastrar_produto.php" method="post">
                <div class="row mb-4">
                  <label class="col-sm-2 col-form-label">Nome do Produto</label>
                  <div class="col-sm-10">
                    <input required maxlength="90" type="text" class="form-control" name="nome_produto">
                  </div>
                </div>
                <div class="row mb-4">
                  <label class="col-sm-2 col-form-label">Fornecedor</label>
                  <select name="id_fornecedor" id="id_fornecedor" class="form-select">
                  <option class="col-sm-10" selected value="0"></option>
                  <?php
                    // Verifica se há resultados
                    if ($result->num_rows > 0) {
                        // Exibe os dados de cada linha encontrada
                        while ($row = $result->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $row["id_fornecedor"] ?>"><?php echo $row["nome_fornecedor"] ?></option>
                    <?php
                        }
                    } else{}
                    // Fecha a conexão com o banco de dados
                    $conection->close();
                  ?>
                  </select>
                </div>
                <div class="row mb-4">
                  <label class="col-sm-2 col-form-label">Valor de Aquisição</label>
                  <div class="col-sm-10">
                    <input required type="number" step="0.01" class="form-control" name="vlr_aquisicao">
                  </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-2 col-form-label">Valor de Venda</label>
                    <div class="col-sm-10">
                      <input required type="number" step="0.01" class="form-control" name="vlr_venda">
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-sm-2 col-form-label">Situação:</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="situacao">
                        <option value="1">Ativo</option>
                        <option value="0">Inativo</option>
                      </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" formmethod="post" formaction="../repositorio/produto_repositorio.php">Cadastrar Produto</button>
              </form>
              <?php
                if (isset($_SESSION['msg'])) {
                    $msg = $_SESSION['msg'];
                    $status = $_SESSION['status'];
                    echo '<p class="text-'.$status.'">'.$msg.'</p>';
                    unset($_SESSION['msg']);
                    unset($_SESSION['status']);
                }
              ?>
          </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>