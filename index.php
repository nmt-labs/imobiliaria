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
      <a class="navbar-brand" href="index.php">Imobiliária</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./forms/imovel.php">Adicionar imóvel</a>
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
      <!-- cabecalho -->
      <div class="row">
        <div class="col">
          <h2>Imóveis</h2>
        </div>
        <div class="col">
          <h2>Inquilinos</h2>
        </div>
      </div>
      <!-- cabecalho -->
    <?php
      require_once "database/conn.php";
      $query = "SELECT imovel.uf 'uf', imovel.cidade 'cidade', imovel.bairro 'bairro', imovel.logradouro 'lougradouro', imovel.numero 'numero', imovel.complemento 'complemento', imovel.id_imovel 'id', imovel.aluguel 'aluguel', imovel.proprietario 'proprietario' FROM imovel;";

      $imoveis = mysqli_query($conn, $query);
      if ($imoveis -> num_rows != 0):
        while ($imovel = mysqli_fetch_assoc($imoveis)):
    ?>

      <!-- dados dos imoveis e inquilinos -->
      <div class="row">
        <div class="col">
          <p><?=$imovel['lougradouro']?>, <?=$imovel['numero']?> <?=$imovel['complemento']?>, <?=$imovel['bairro']?> - <?=$imovel['cidade']?>/<?=$imovel['uf']?></p>
          <p><b>Aluguel:</b> R$ <?=$imovel['aluguel']?></p>
          <p><b>Proprietario:</b> <?=$imovel['proprietario']?></p>
        </div>
        <div class="col accordion" id="accordionList">
            <?php
              $id = $imovel['id'];
              $queryInquilino = "SELECT inquilino.nome 'inquilino', inquilino.cpf 'cpf', inquilino.telefone 'telefone', inquilino.data_nascimento 'data', inquilino.id_inquilino 'id' FROM inquilino WHERE inquilino.imovel = $id;";
              $inquilinos = mysqli_query($conn, $queryInquilino);
              while ($inquilino = mysqli_fetch_assoc($inquilinos)):
                $data = implode('/', array_reverse(explode('-', $inquilino['data'])));
            ?>

            <div class="accordion-item">
              <h2 class="accordion-header" id="inquilino<?= $inquilino['id'] ?>">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $inquilino['id'] ?>" aria-expanded="false" aria-controls="collapse<?= $inquilino['id'] ?>">
                <?= $inquilino['inquilino'] ?>
                </button>
              </h2>
              <div id="collapse<?= $inquilino['id'] ?>" class="accordion-collapse collapse" aria-labelledby="inquilino<?= $inquilino['id'] ?>" data-bs-parent="#accordionList">
                <div class="accordion-body">
                  <p><b>CPF:</b> <?= $inquilino['cpf'] ?></p>
                  <p><b>Telefone:</b> <?= $inquilino['telefone'] ?></p>
                  <p><b>Data de nascimento:</b> <?= $data ?></p>
                </div>
              </div>
            </div>
            <?php endwhile ?>
        </div>
      </div>
      <!-- dados -->
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