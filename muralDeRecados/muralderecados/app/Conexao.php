<?php

namespace app;

use PDO;

class Conexao
{
    public static $conexao = null;
    public static function conecta()
    {
        if (self::$conexao == null) {
            self::$conexao = new PDO('mysql:host=localhost;port=3308;dbname=tads', '', '');
        }
        return self::$conexao;
    }
}
