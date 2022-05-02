<?php

namespace DAO;

class AlunoDAO
{
  public int $id;
  public string $nome;
  public string $instituicao;

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
    $query = "INSERT INTO alunos(nome) VALUES ('$nome')";
    echo $query; // fazer isso para verificar se a query está derta (geralmente os problemas são aqui). Vai imprimir exatamente como a query vai sair
    die();
    if (!$result = $conexao->query($query)) {
      die($conexao->error); // lançar erro
      return false;
    }
    return true;
  }
}
