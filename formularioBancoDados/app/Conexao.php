<?php

namespace app;


use mysqli;
use PDO;

class Conexao
{
  public static $conexao = null;

  public static function conecta()
  {
    if (self::$conexao == null) {
      self::$conexao = new PDO('mysql:host=localhost;port=;');
      $conexao->

      // PDO::query -> executa somente SQL selects e retorna um objeto PDO statement.
      // PDO:: exec -> insert, delete e update. Retorna o número de linhas afetadas
      // PDO::prepare -> prepara um comando para execução e retorna um objeto PDO statement.
    }
  }

  public static function conectaAntigo() {
    if (self::$conexao == null) {
      self::$conexao = new mysqli('localhost', 'root', '', 'tads');
    }

    return self::$conexao;
  }
}

// PDO: portátil em relação ao banco de dados; não está vinculado que nem o mysqli
// PDO não possui a versão procedural que nem o mysqli possui.
