<?php
require_once('Pessoa.php');
require_once('Matricula.php');

class Aluno extends Pessoa
{
  public Matricula $matricula;

  const INSTITUICAO = "Vianna"; //constantes não têm dólar e são acessíveis de foa da classe

  static int $qtdAlunos = 0;

  public function __construct(string $nome = null, int $idade = 0, int $cpf = 0, int $matriculaNum = 0, string $matriculaData = '', int $matriculaPeriodo = 0)
  {

    parent::__construct($nome, $cpf, $idade); // chamada explícita do contrutor pai
    Pessoa::__construct();


    $this->matricula  = new Matricula($matriculaNum, $matriculaData, $matriculaPeriodo);
    self::$qtdAlunos++;
    Aluno::$qtdAlunos++; // propriedade estática
  }

  public function exibeNome()
  {
    // parent::exibeIntro(); // classe pai
    self::exibeIntro(); // classe
    $this->exibeIntro(); // objeto
    echo $this->nome;
  }

  public function exibeAtributo(string $atributo)
  {
    echo $this->$atributo; // o $ permite a gambiarra no atributo, mas não costumamos usar
  }

  public static function exibeIntro()
  {
    echo "<p> Introdução Aluno</p>";
    echo "<p> Instituição" . Aluno::INSTITUICAO . "</p>";
  }

  public function getMatricula()
  {
    return $this->matricula;
  }

  public function __destruct()
  {
    // imprimir no log a destruição melhora o debug. É chamado quando o objeto não for mais utilizado (o escopo for encerrado)

    echo 'Destruindo o objeto aluno';
  }
}
