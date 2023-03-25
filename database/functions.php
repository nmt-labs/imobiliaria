<?php
  function cadastroImovel(){
    require_once "conn.php";

    $uf = $_POST['uf'];
    $cidade = $_POST['cidade'];
    $bairro = $_POST['bairro'];
    $logradouro = $_POST['logradouro'];
    $numero = $_POST['numero'];
    if (isset($_POST['complemento'])) {
      $complemento = $_POST['complemento'];
    } else $complemento = "Nenhum";
    $cep = $_POST['cep'];
    $aluguel = $_POST['aluguel'];
    $proprietario = $_POST['proprietario'];

    $query = "INSERT INTO
      imovel(uf, cidade, bairro, logradouro, numero, complemento, cep, aluguel, proprietario) 
    VALUES
    (
      '$uf',
      '$cidade',
      '$bairro',
      '$logradouro',
      '$numero',
      '$complemento',
      '$cep',
      $aluguel,
      '$proprietario'
    )";

    $result = mysqli_query($conn, $query);
    // redirecionar para pagina de sucesso ou falha
    if($result) header("location: ../forms/imovel.php?cad=ok");
    else header("location: ../forms/imovel.php?cad=fail");
  }

  function cadastroInquilino(){
    require_once "conn.php";

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $data_nascimento = $_POST['data_nascimento'];
    $imovel = $_POST['imovel'];
    
    $query = "INSERT INTO
      inquilino(nome, cpf, telefone, data_nascimento, imovel) 
    VALUES
    (
      '$nome',
      '$cpf',
      '$telefone',
      '$data_nascimento',
      $imovel
    )";

    $result = mysqli_query($conn, $query);
    // redirecionar para pagina de sucesso ou falha
    if($result) header("location: ../forms/inquilino.php?cad=ok");
    else header("location: ../forms/inquilino.php?cad=fail");
  }

  if (isset($_POST['verify'])) {
    $verify = $_POST['verify'];
    if ($verify == "imovel") {
      cadastroImovel();
    }
    if ($verify == "inquilino") {
      cadastroInquilino();
    }
    else{
      echo "Erro de envio de formulario";
    }
  }
  else{
    echo "Ocorreu um erro";
  }
?>