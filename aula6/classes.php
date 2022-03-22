<?php
// PHP não nasceu orientado a objetos, e sim procedural.
// As classes e objetos só surgiram a partir da versão 5
class carro {
  // variáveis
  // funções
  // construtores

  //__construct  // construtor mais recente, havia um outro até o PHP 4


  public string $nome;

  function __construct() {
    // todas as funções do php com __ no início são "Magic Methods"

    $this -> nome  = 'oi';

  }

  function somar(int $a, int $b): int {
    return $a + $b;
  }
}

// Após o PHP 7, é possível tipar os parãmetros e o retorno de uma função
