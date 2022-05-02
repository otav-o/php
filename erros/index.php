<?php

/*
  Preferir ifs a lançar exceções (estas são computacionalmente custosas)

  Strict, notice, warnings, error  (sugestẽs de melhoria, pode produzier um resultado inesperado, erro em tempo de execução não fatal, erro fatal)


  $x = $y + 3; // E_NOTICE;
$fh = fopen('arquivonaoexistente', 'r'); // E_WARNING
funcaoNaoExiste(); // E_ERROR

  php.ini -> arquivo de configuração que fica noservidor e contém todas as diretivas para o funcioanmento do php. Tem desativado o "display_errors", já que em produção ele deveria estar desativado mesmo 
      deixar display_errors = On

  lembrar de colocar 

*/

function somaUm($var = 0)
{
  if ($var < 3) {
    trigger_error('O valor deve ser maior que 3, erro fatal', E_USER_ERROR);
  } else if ($var == 10) {
    trigger_error('O valor não deveria ser igual a 10, mas eu aceito', E_USER_NOTICE);
  } else if ($var == 20) {
    trigger_error('O valor não deveria ser igual a 20, mas eu aceito', E_USER_WARNING);
  }
  return $var + 1;
}

echo somaUm(5) . '<br>';
echo somaUm(4) . '<br>';
echo somaUm(10) . '<br>';
echo somaUm(20) . '<br>';
echo somaUm(2);

var_dump(ini_get('display_errors'));
error_reporting(E_USER_WARNING);
// ini_set('display_errors', ); // perdi o restante
fopen('arquivo1', 'r');


// log_errors = On



/**
 * 
 */
function tratarErro($errno, $errstr, $file, $context)
{ // a ordem importa: número do erro, string, arquivo, contexto
  var_dump($errno, $errstr, $file, $context);
}

set_error_handler('tratarErro'); // ex.: caiu algo no servidor: manda email para o administrador da infra, ou registra logs. Centraliza os tratamentos.

// nem todo tratamento de erro precisa ser por uma função específica, usar if-else no código resolve muitos casos

// $db = mysql_connect();
// if (!$db) {
//   // etc.
// }



// ------
// Tratando exceções com try-catch
class Conexao
{
  private Conexao $conexao;
  public static function conecta()
  {
    if (self::$conexao == null) {
      try {
        self::$conexao = new PDO('mysql:host=localhost;port=3308;dbname=tads', 'root', '');
      } catch (PDOException $exception) {
        echo $exception->getMessage();
      }
    }
  }
}

// default_handler // pega qualquer exceção não tratada

function tratarException($exception)
{
  echo $exception->getMessage();
}

set_exception_handler('tratarException');
