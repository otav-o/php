<?php

$db = new mysqli("localhost", "root", "", "aula9");
var_dump($db);

if ($db->connect_errno > 0) {
  die("Não foi possível conectar: {$db->connect_errno}");
}

$query = 'SELECT * FROM `alunos`';

if (!$result = $db->query($query)) {
  die("Ocorreu um erro! {$db->error}");
}

var_dump($result);

while ($row = $result->fetch_assoc()) {
  echo $row["nome"] . '<br>';
}
