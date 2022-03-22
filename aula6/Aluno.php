<?php
require_once('Pessoa.php');

class Aluno extends Pessoa {
  public string $nome;
  public int $idade;

  public function __construct(string $nome = null, int $idade = 0, int $cpf=0, int $matricula=0) {

    parent::__construct($nome, $cpf, $idade); // chamada explícita do contrutor pai
    Pessoa::__construct();


    $this->matricula  = $matricula;
  }

  public function exibeNome() {
    echo $this -> nome;
  }

  public function exibeAtributo(string $atributo) {
    echo $this->$atributo; // o $ permite a gambiarra no atributo, mas não costumamos usar
  }

  public static function exibeIntro() {
    echo "<p> Introdução </p>";
  }
}


// require_once 'Aluno.php';

$otavio = new Aluno("<h1>Otávio Augusto</h1>", 25, '12345345', 1234);
$otavio->exibeNome();
$otavio->exibeAtributo('idade');


// O PHP permite herança, mas não a múltipla (não permite polimorfismo) - ?

// :: executa a resolução do escopo. Serve para acessar atributo ou método da classe (estaáicos)

Aluno::exibeIntro();


