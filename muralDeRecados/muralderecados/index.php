<?php
require_once "app/Conexao.php";
require_once "app/DAO/Recado.php";

use app\DAO\Recado;

if (isset($_POST['acao']) && ($_POST['acao'] == 'Cadastrar')) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cidade = $_POST['cidade'];
    $recado = $_POST['recado'];

    if (Recado::novo($nome, $email, $cidade, $recado)) {
        echo 'Recado cadastrado!';
    }
} else if (isset($_GET['excluir'])) {
    $id = $_GET['excluir'];
    if (Recado::excluir($id)) {
        echo 'Recado apagado!';
    }
} else if (isset($_GET['alterar'])) {
    $id = $_GET['alterar'];
    $recado = Recado::retornaRecado($id);
    $nome = $recado->retornaCampo('nome');
    $email = $recado->retornaCampo('email');
    $cidade = $recado->retornaCampo('cidade');
    $mensagem = $recado->retornaCampo('recado');
} else if (isset($_GET['atualiza'])) {
    $id = $_GET['atualiza'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cidade = $_POST['cidade'];
    $recado = $_POST['recado'];
    if (Recado::atualiza($id, $nome, $email, $cidade, $recado)) {
        echo 'Recado Alterado!';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mural de recados</title>
</head>

<body>
    <form action="<?= isset($id) ? 'index.php?atualiza=' . $id : 'index.php' ?> " method="post">
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome" value="<?= $nome ?? '' ?>"><br>
        <label for="email">Email: </label>
        <input type="email" name="email" id="email" value="<?= $email ?? '' ?>"><br>
        <label for="cidade">Cidade: </label>
        <input type="text" name="cidade" id="cidade" value="<?= $cidade ?? '' ?>"><br>
        <label for="recado">Recado:</label><br>
        <textarea name="recado" id="recado" cols="30" rows="10"><?= $mensagem ?? '' ?></textarea><br>
        <input type="submit" value="<?= isset($_GET['alterar']) ? 'Atualizar' : 'Cadastrar' ?>" name="acao">
    </form>
    <?php
    Recado::exibeRecados();
    ?>
</body>

</html>