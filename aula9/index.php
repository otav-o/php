<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>



  <?php

  require_once "DAOs\AlunoDAO.php";

  use DAO\AlunoDAO;

  $aluno = new AlunoDAO(1, 'Joaozinho');

  $db = new mysqli("localhost", "root", "", "aula9");

  var_dump($db);
  echo '<br>';

  if ($db->connect_errno > 0) {
    die("Não foi possível conectar: {$db->connect_errno}");
  }

  $query = 'SELECT * FROM `alunos`';

  if (!$result = $db->query($query)) {
    die("Ocorreu um erro! {$db->error}");
  }

  var_dump($result);

  echo "<li class='list-group-item'> Total de alunos: {$result->num_rows}<br>";


  while ($row = $result->fetch_assoc()) {
    echo '<li class="list-group-item">' . $row["nome"] . '</li>';
  }



  // fetch object não pode ter construtor com parâmetro obrigatório, pois ele sempre injeta as propriedades e depois cria o objeto. Chama o construtor só depois, se tiver valores padrão, eles irão sobrescrever.
  while ($aluno = $result->fetch_object('DAO\AlunoDAO')) {
    $aluno->printData();
  }



  // preencher o result novamente, pois é consumido como em uma fila. Novo acesso à base de dados.
  if (!$result = $db->query($query)) {
    die("Ocorreu um erro! {$db->error}");
  }

  // fetch_all() pega todos os resultados de uma só; array completo com todos os valores (id e nome)
  while ($row = $result->fetch_row()) {
  }

  $db->close();
  ?>

  <table class="table table-dark table-borderless">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Nome</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <?php
        while ($row = $result->fetch_assoc()) {
          echo '<td scope="row">';
          echo $row["id"];
          echo '</td>';
          echo '<td>';
          echo $row["nome"];
          echo '</td>';
        }
        ?>
      </tr>
    </tbody>
  </table>
</body>