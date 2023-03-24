<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Imobiliaria</title>
</head>
<body>
  <!-- navegacao -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="../index.php">Imobiliaria</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../forms/imovel.php">Adicionar imovel</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../forms/inquilino.php">Adicionar inquilino</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- navegacao -->
  <!-- contaudo -->
  <main>
    <form action="../database/functions.php" method="post">
      <div class="m-5 p-2">
        <div class="mb-3 input-group">
          <span class="input-group-text">CEP</span>
          <input type="text" class="form-control" id="cep" name="cep" placeholder="XXXXXXXX">
          <div class="p-2">
            <button type="button" id="btnCep" class="btn btn-outline-primary">Buscar CEP</button>
          </div>
        </div>

        <div class="mb-3 input-group">
          <span class="input-group-text">Logradouro</span>
          <input type="text" class="form-control api-cep" id="logradouro" name="logradouro">
          <span class="input-group-text">Bairro</span>
          <input type="text" class="form-control api-cep" id="bairro" name="bairro">
        </div>

        <div class="mb-3 input-group">
          <span class="input-group-text">Numero</span>
          <input type="text" class="form-control" id="numero" name="numero">
          <span class="input-group-text">Complemento</span>
          <input type="text" class="form-control" id="complemento" name="complemento">
          <span class="input-group-text">UF</span>
          <input type="text" class="form-control api-cep" id="uf" name="uf">
          <span class="input-group-text">Cidade</span>
          <input type="text" class="form-control api-cep" id="cidade" name="cidade">
        </div>

        <div class="mb-3 input-group">
          <span class="input-group-text">Aluguel</span>
          <input type="number" class="form-control" id="aluguel" name="aluguel">
          <span class="input-group-text">Proprietario</span>
          <input type="text" class="form-control" id="proprietario" name="proprietario">
        </div>

        <input type="text" name="verify" value="imovel" readonly class="d-none">
        <div class="p-2 float-end">
        <?php
          if (isset($_GET["cad"])){
            if ($_GET["cad"]=="ok"){
              $texto = "Cadastro realizado com sucesso!";
            }
          }
          else $texto = "";
          ?>
          <span class="text-success"><?php echo $texto?></span>
          <button type="submit" class="btn btn-outline-primary">Confirma</button>
        </div>
      </div>
    </form>
  </main>
  <!-- conteudo -->

  <script src="../js/busca-cep.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</body>
</html>