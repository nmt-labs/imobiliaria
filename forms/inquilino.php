<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Imobiliária</title>
</head>
<body>
  <!-- navegacao -->
    <nav class="navbar bg-info navbar-expand-lg">
    <div class="container-fluid m-1">
      <a class="navbar-brand" href="../index.php">Imobiliária</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../forms/imovel.php">Adicionar imóvel</a>
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
          <span class="input-group-text">Nome</span>
          <input type="text" class="form-control" id="nome" name="nome">
        </div>

        <div class="mb-3 input-group">
          <span class="input-group-text valida-cpf">CPF</span>
          <input type="text" class="form-control valida-cpf" id="cpf" name="cpf" placeholder="XXXXXXXXXXX">
          <span class="input-group-text">Telefone</span>
          <input type="text" class="form-control" id="telefone" name="telefone" placeholder="XXXXXXXXXXX">
        </div>

        <div class="mb-3 input-group">
          <span class="input-group-text">Data de nascimento</span>
          <input type="date" class="form-control" id="data_nascimento" name="data_nascimento">
          <span class="input-group-text">Imóvel</span>
          <select class="form-select w-50" id="imovel" name="imovel">
            <option selected>Selecione um imovel</option>
            <!-- lista de imoveis -->
            <?php
              require_once "../database/conn.php";
              $imovel = mysqli_query($conn, "SELECT imovel.uf 'uf', imovel.cidade 'cidade', imovel.bairro 'bairro', imovel.logradouro 'lougradouro', imovel.numero 'numero', imovel.complemento 'complemento', imovel.id_imovel 'id' FROM imovel");
              while ($imoveis = mysqli_fetch_array($imovel)):
            ?>
              <option value="<?=$imoveis['id']?>">
              <?=$imoveis['lougradouro']?>, <?=$imoveis['numero']?> <?=$imoveis['complemento']?>, <?=$imoveis['bairro']?> - <?=$imoveis['cidade']?>/<?=$imoveis['uf']?>
              </option>
            <?php
              endwhile;
            ?>
            <!-- lista de imoveis -->
          </select>
        </div>

        <input type="text" name="verify" value="inquilino" readonly class="d-none">
        <div class="p-2 float-end">
          <!-- mensagem de retorno -->
          <?php
            if (isset($_GET["cad"])) {
              if ($_GET["cad"]=="ok") {
                $cor = "success";
                $texto = "Cadastro realizado com sucesso!";
              }
              else {
                $cor = "danger";
                $texto = "Falha ao cadastrar";
              }
            }
            else {
              $cor = "danger";
              $texto = "";
            }
          ?>
          <span class="text-<?php echo $cor?>"><?php echo $texto?></span>
          <!-- mensagem de retorno -->
          <button type="submit" class="btn btn-outline-primary">Confirma</button>
        </div>
      </div>
    </form>
  </main>
  <!-- conteudo -->

  <script src="../js/validar-cpf.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</body>
</html>