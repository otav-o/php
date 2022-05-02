<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Document</title>

</head>

<body style="padding: 50px;">
  <header>
    <h1 class="h1">Valores inseridos</h1>
  </header>

  <?php
  function checarSeVazio($valor): string
  {
    return $valor == null ? 'Vazio' : $valor;
  }
  ?>

  <main>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Dado</th>
          <th scope="col">Valor</th>
          <th scope="col">Observação</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">Nome</th>
          <td><?= ucwords(strtolower(checarSeVazio($_POST['nome']))) ?></td>
        </tr>
        <tr>
          <th scope="row">Email</th>
          <td><?= checarSeVazio(strtolower($_POST['email'])) ?></td>
        </tr>
        <tr>
          <th scope="row">Endereço</th>
          <td><?= ucwords(strtolower(checarSeVazio($_POST['endereco']))) ?></td>
        </tr>
        <tr>
          <th scope="row">Profissão</th>
          <td><?= checarSeVazio($_POST['ocupacao']) ?></td>
        </tr>
        <tr>
          <th scope="row">Gênero</th>
          <td><?= checarSeVazio($_POST['genero']) ?></td>
        </tr>
        <tr>
          <th scope="row">Senha</th>
          <td><?= checarSeVazio($_POST['senha']) ?></td>
          <td>
            <?php
            if (checarSeVazio($_POST['senha']) !== 'Vazio') {
              if (strlen($_POST['senha']) < 6) {
                echo 'Senha fraca';
              } else {
                echo 'Senha forte';
              }
            } else {
              echo 'Senha não inserida';
            }
            ?></td>
        </tr>
        <tr>
          <th scope="row">Confirmação de senha</th>
          <td><?= checarSeVazio($_POST['confirmacaoSenha']) ?></td>
          <td>
            <?php
            if (checarSeVazio($_POST['senha']) !== 'Vazio' && checarSeVazio($_POST['confirmacaoSenha']) !== 'Vazio') {
              if ($_POST['senha'] === $_POST['confirmacaoSenha']) {
                echo 'Senhas iguais';
              } else {
                echo 'Senhas diferentes';
              }
            } else {
              echo 'Alguma senha não foi inserida';
            }
            ?></td>
        </tr>
        <tr>
          <th scope="row">Mensagem</th>
          <td><?= checarSeVazio($_POST['mensagem']) ?></td>
        </tr>
      </tbody>

    </table>

  </main>
  <footer>
    <small>Primeira atividade avaliativa de TADS - Otávio Dioscânio 15/03/2022</small>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>