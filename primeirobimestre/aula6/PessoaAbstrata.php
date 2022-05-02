<?php

abstract class PessoaAbstrata
{
  protected string $nome;
  private string $cpf;
  public int $idade;

  // sem constutor

  // todo mundo que herdar desta classe precisa implementar esta função ou dizer que é abstrato.
  public abstract function exibeDados();
  public static function imprimeIntro()
  {
    echo "<p>Introdução Pessoa abstrata</p>";
  }
}
