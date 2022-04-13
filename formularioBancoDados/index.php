<?php
require_once "app/Conexao.php"; // quando não usa namespaces
require_once "app/Recado.php";

use app\DAO\Recado;

if (isset($_POST['acao'])) {
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $cidade = $_POST['cidade'];
  $recado = $_POST['recado'];

  if (Recado::novo($nome, $email, $cidade, $recado)) {
    echo 'Recado cadastrado';
  } else if (isset($_GET['excluir'])) {
    $id = $_GET['excluir'];
    if (Recado::excluir($id)) {
      echo 'Recado apagado!';
    }
  } else if (isset($_GET['alterar'])) {
    $id = $_GET['alterar'];
    $recado = Recado::retornaRecado($id);

    $nome = $recado->retornaCampo('nome');
    $email = $recado->retornaCampo('email');
    $cidade = $recado->retornaCampo('cidade');
    $mensagem = $recado->retornaCampo('recado');
  } else if (isset($_GET['atualiza'])) {
    $id = $_GET['atualiza'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cidade = $_POST['cidade'];
    $recado = $_POST['recado'];

    if (Recado::atualiza($id, $nome, $email, $cidade, $recado)) {
      echo 'Recado alterado';
    }
  }
}

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exercício 11/04/2022</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <style>
    body {
      padding: 200px;
    }
  </style>
</head>

<body>
  <h1 class='h1'>Atividade 11/04/2022</h1>
  <form action="<?= isset($id) ? 'index.php?atualiza=' . $id : 'index.php' ?>" method="post">
    <div class="mb-3">
      <label for="nome" class="form-label">Nome:</label>
      <input type="text" class="form-control" id="nome" name="nome" value="<?= $nome ?? '' ?>">
      <!-- ternário com duas interrogações checa se é null (if issset()), aplicando um default se der fals) -->
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email:</label>
      <input type="email" class="form-control" id="email" name="email" value="<?= $email ?? '' ?>">
    </div>
    <div class="mb-3">
      <label for="cidade" class="form-label">Cidade:</label>
      <input type="text" class="form-control" id="cidade" name="cidade" value="<?= $cidade ?? '' ?>">
    </div>
    <div class="mb-3">
      <label for="recado" class="form-label">Recado:</label>
      <textarea class="form-control" id="recado" rows="3" name="recado"></textarea>
      <input type="text" class="form-control" id="recado" name="recado" value="<?= $mensagem ?? '' ?>">
    </div>
    <input type="hidden" name="id" value="<?= $id ?>">
    <input type="submit" name="cadastrar" value="<?= isset($id) ? 'Atualizar' : 'Cadastrar' ?>">
  </form>

  <?php
  Recado::exibeRecados();
  ?>
</body>

</html>