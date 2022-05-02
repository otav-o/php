<?php

namespace app\DAO;

use app\Conexao;
use PDO;

class Recado
{
    private $nome;
    private $email;
    private $cidade;
    private $recado;

    public static function novo($nome, $email, $cidade, $recado)
    {
        $db = Conexao::conecta();
        $sql = "INSERT INTO `tads`.`recado` (`nome`, `email`, `cidade`, `recado`) VALUES (?, ?, ?, ?);";

        $stmt = $db->prepare($sql);
        $stmt->bind_param('ssss', $nome, $email, $cidade, $recado);
        $stmt->execute();

        if (!$result = $stmt->get_result()) {
            echo $db->error;
            return false;
        }
        return true;

        $db = Conexao::conecta();
        $sql = "INSERT INTO `tads`.`recado` (`nome`, `email`, `cidade`, `recado`) VALUES (:nome, :email, :cidade, :recado);";
        $stmt->bind_param('ssss', $nome, $email, $cidade, $recado);
        $stmt->execute();

        // msqli é oo e procedural; performance leevada; sintaxe mais simples. Só funciona com bancos mysql, não ossui paâmetros nomeados, não possui prepared statements do lado do cliente (php)
        // pdo funciona com 12 drivers de bancos de dados. É OO, possui placeholder nomeado (parâmetros), possui prepared statements do lado cliente. Não tão veloz quanto mysqli, e, por padrão, simula os prepared statements do SGBD (já que ele não sabe se ele tem).
    }

    public static function exibeRecados()
    {
        $db = Conexao::conecta();
        $sql = "SELECT * FROM `tads`.`recado`";

        if (!$result = $db->query($sql)) {
            return false;
        }
        echo "<table border=1>";
        echo "<tr> 
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Cidade</th>
                    <th>Recado</th>
                    <th>Excluir</th>
                    <th>Alterar</th>
                </tr>";
        $result->setFetchMode(PDO::FETCH_CLASS, 'app\DAO\Recado');
        foreach ($result as $recado) {
            echo "<tr>";
            echo "<td>" . $recado->retornaCampo('nome') . "</td>";
            echo "<td>" . $recado->retornaCampo('email') . "</td>";
            echo "<td>" . $recado->retornaCampo('cidade') . "</td>";
            echo "<td>" . $recado->retornaCampo('recado') . "</td>";
            echo "<td><a href=\"index.php?excluir=" . $recado->retornaCampo('id') . "\">X</a></td>";
            echo "<td><a href=\"index.php?alterar=" . $recado->retornaCampo('id') . "\">X</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    public static function excluir($id)
    {
        $db = Conexao::conecta();
        $sql = "DELETE FROM `tads`.`recado` WHERE  `id`=?;";
        $stmt = $db->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        if (!$result = $stmt->get_result()) {
            echo $db->error;
            return false;
        }
        return true;
    }
    public function retornaCampo($campo)
    {
        if (isset($this->$campo)) {
            return $this->$campo;
        }
    }

    public static function retornaRecado($id)
    {
        // $db = Conexao::conecta();
        // $sql = "SELECT * FROM `tads`.`recado` WHERE `recado`.`id`=?";
        // $stmt = $db->prepare($sql);
        // $stmt->bind_param('i', $id);
        // $stmt->execute();
        // if (!$result = $stmt->get_result()) {
        //     echo $db->error;
        //     return false;
        // }
        // if ($recado = $result->fetch_object('app\DAO\Recado')) {
        //     return $recado;
        // } else {
        //     return false;
        // }

        $db = Conexao::conecta();
        $sql = "SELECT * FROM `tads`.`recado` WHERE `recado`.`id`=:id";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'app\DAO\Recado');

        if ($recado = $result->fetch()) { // é um elemento só
            return $recado;
        } else {
            return false;
        }
    }

    public static function atualiza($id, $nome, $email, $cidade, $recado)
    {
        $db = Conexao::conecta();
        $sql = "UPDATE `tads`.`recado` SET `nome`=?, `email`=?, `cidade`=?, `recado`=? WHERE  `id`=?";

        $stmt = $db->prepare($sql);
        $stmt->bind_param('ssssi', $nome, $email, $cidade, $recado, $id);
        $stmt->execute();

        if (!$result = $stmt->get_result()) {
            echo $db->error;
            return false;
        }
        return true;


        $db = Conexao::conecta();
        $sql = "UPDATE `tads`.`recado` SET `nome`=?, `email`=?, `cidade`=?, `recado`=:recado WHERE  `id`=?";

        $stmt = $db->prepare($sql);
        $stmt->bindValue(1, $nome);
        $stmt->bindValue(2, $email);
        $stmt->bindValue(3, $cidade);
        $stmt->bindValue(':recado', $recado);
        $stmt->bindValue(':id', $id);


        return $stmt->execute();
    }
}
