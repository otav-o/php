<?php

class Pessoa {
  public string $nome;
  public string $cpf;
  public int $idade;

  public function __construct(string $nome = '', string $cpf = '', int $idade = 0)
  {
    $this->nome = $nome; // chama-se o atributo sem o dólar
    $this->cpf = $cpf;
    $this->idade = $idade;
  }

  public function exibeDados() {
    echo "<p>Nome: {$this->nome}</p>";
    echo "<p>Nome: {$this->cpf}</p>";
    echo "<p>Nome: {$this->idade}</p>";
  }
}

// herança: extends. Dar um require_once primeiro
// O construtor pai deve ser explicitamente chamado de dentro do construtor filho, se quiser ser executado.