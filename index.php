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
      <a class="navbar-brand" href="index.php">Imobiliaria</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./forms/imovel.html">Adicionar imovel</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./forms/inquilino.php">Adicionar inquilino</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- navegacao -->
  <!-- contaudo -->
  <main>
    <div class="tabela m-5 p-2">
      <div class="row">
        <div class="col">
          <h2>Imoveis</h2>
        </div>
        <div class="col">
          <h2>Inquilinos</h2>
        </div>
      </div>
    <?php
      require_once "database/conn.php";
      $query = "SELECT imovel.uf 'uf', imovel.cidade 'cidade', imovel.bairro 'bairro', imovel.logradouro 'lougradouro', imovel.numero 'numero', imovel.complemento 'complemento', imovel.id_imovel 'id' FROM imovel;";

      $imoveis = mysqli_query($conn, $query);
      if ($imoveis -> num_rows != 0):
        while ($imovel = mysqli_fetch_assoc($imoveis)):
    ?>

      <div class="row">
        <div class="col">
          <p><?=$imovel['lougradouro']?>, <?=$imovel['numero']?> <?=$imovel['complemento']?>, <?=$imovel['bairro']?> - <?=$imovel['cidade']?>/<?=$imovel['uf']?></p>
        </div>
        <div class="col">
            <?php
              $id = $imovel['id'];
              $queryInquilino = "SELECT inquilino.nome 'inquilino' FROM inquilino WHERE inquilino.imovel = $id;";
              $inquilinos = mysqli_query($conn, $queryInquilino);
              while ($inquilino = mysqli_fetch_assoc($inquilinos)):
            ?>
            <p>
              <?= $inquilino['inquilino'] ?>
            </p>
            <?php endwhile ?>
        </div>
      </div>
      <hr>

    <?php
        endwhile;
      endif;
    ?>
    </div>
  </main>
  <!-- conteudo -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</body>
</html>