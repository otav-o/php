<?php

namespace app\DAO;

use app\Conexao;

class Recado
{
  private $nome;
  private $email;
  private $cidade;
  private $recado;

  public static function novo($nome, $email, $cidade, $recado)
  {
    $db = Conexao::conecta();
    $sql = "INSERT INTO recados(nome, email, cidade, recado) VALUES ('$nome', '$email', '$cidade', '$recado')";

    if (!$result = $db->query($sql)) {
      echo $db->error;
      return false;
    }
    return true;
  }


  public static function exibeRecados()
  {
    $db = Conexao::conecta();
    $sql = "SELECT * FROM recados";

    if (($result = $db->query($sql)) == false) {
      echo $db->error;
      return false;
    }
    echo "<table class='table'>";
    echo "<tr scope='col'>
            <th>Nome</th>
            <th>Email</th>
            <th>Cidade</th>
            <th>Recado</th>
          </tr>";
    echo "</table>";

    while ($recado = $result->fetch_object('app\DAO\Recado')) {
      var_dump($recado);
      echo "<tr scope='col'>";
      echo "<td>" . $recado->retornaCampo('nome') . "</td>";
      echo "<td>" . $recado->retornaCampo('email') . "</td>";
      echo "<td>" . $recado->retornaCampo('cidade') . "</td>";
      echo "<td>" . $recado->retornaCampo('recado') . "</td>";
      echo "<td> <a href='index.php?excluir?'" . $recado->retornaCampo('id') . "X</a></td>"; // faz requisição GET com variável excluir
      echo "<td> <a href='index.php?alterar?'" . $recado->retornaCampo('id') . "X</a></td>"; // faz requisição GET com variável alterar
      echo "</tr>";
    }
  }

  public static function excluir($id)
  {
    $db = Conexao::conecta();
    $sql = "DELETE FROM recados WHERE id=$id";

    if (!$result = $db->query($sql)) {
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
    $db = Conexao::conecta();
    $sql = "SELECT * FROM recados WHERE id = $id";

    if (($result = $db->query($sql)) == false) { // verifica se a query deu erro
      echo $db->error;
      return false;
    }
    if ($recado = $result->fetch_object('app\DAO\Recado')) { // verifica se não encontrou nada
      return $recado;
    } else {
      return false;
    }
  }

  public static function atualiza($id, $nome, $email, $cidade, $recado)
  {
    $db = Conexao::conecta();
    $sql = "UPDATE recados SET nome=$nome, email=$email, cidade=$cidade, recado=$recado) WHERE id=$id";

    if (!$result = $db->query($sql)) {
      echo $db->error;
      return false;
    }
    return true;
  }
}
