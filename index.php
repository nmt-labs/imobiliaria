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
  <nav>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="./forms/imovel.html">Adicionar imovel</a></li>
      <li><a href="./forms/inquilino.html">Adicionar inquilino</a></li>
    </ul>
  </nav>
  <!-- navegacao -->
  <!-- contaudo -->
  <main>
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
        <p><?= $imovel['bairro']; ?></p>
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
  </main>
  <!-- conteudo -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</body>
</html>