<?php

namespace DAO;

class AlunoDAO
{
  public int $id;
  public string $nome;

  public function __construct()
  {
    $this->instituicao = 'Vianna Jr';
  }

  public function printData()
  {
    echo "<p>";
    echo "Id: {$this->id} - Nome: {$this->nome}";
    echo "</p>";
  }

  public static function save($conexao, $nome)
  {
    # TODO: implementar para a próxima aula. 
    $query = "INSERT INTO alunos(nome) VALUES ($nome)";
  }
}
