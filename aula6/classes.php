<?php
// PHP não nasceu orientado a objetos, e sim procedural.
// As classes e objetos só surgiram a partir da versão 5
class carro
{
  // variáveis
  // funções
  // construtores

  //__construct  // construtor mais recente, havia um outro até o PHP 4


  public string $nome;

  function __construct()
  {
    // todas as funções do php com __ no início são "Magic Methods"

    $this->nome  = 'oi';
  }

  function somar(int $a, int $b): int
  {
    return $a + $b;
  }
}

// Após o PHP 7, é possível tipar os parãmetros e o retorno de uma função

require_once 'Aluno.php';

$otavio = new Aluno("<h1>Otávio Augusto</h1>", 25, '12345345', 1234, '01/01/2022', 3);
var_dump($otavio);
$otavio->exibeNome();
$otavio->exibeAtributo('idade');

var_dump($otavio->getMatricula());
$otavio->getMatricula()->exibeMatricula(); // sobrecarga de métodos.


// O PHP permite herança, mas não a múltipla (não permite polimorfismo) - ?

// :: executa a resolução do escopo. Serve para acessar atributo ou método da classe (estaáicos)

Aluno::exibeIntro();


// $a = new Aluno(null, 2);
// $a->exibeNome();

$otavio::INSTITUICAO; // uso de uma constante
echo Aluno::$qtdAlunos;
