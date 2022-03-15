<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- quando o action está vazio, fica na mesma página -->
    <form action="" method="post"> 
        <input type="text" name="nome" id="">
        <input type="submit" value="Enviar">
    </form>

    <?php
    if (isset($_POST["nome"])) { // verificar se a variável foi criada antes de exibi-la
        echo "O nome digitado foi ".$_POST["nome"] . "<br>";
        echo "O nome digitado foi {$_POST['nome']}";
    }
    ?>
<br>
    <form action="" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id=""> <br>
        <label for="optCivil">Estado Civil:</label>
        <input type="radio" name="optCivil" value="solteiro">Solteiro(a)
        <input type="radio" name="optCivil" value="casado">Casado(a)<br>
        <label for="estado">Estado:</label>
            <select name="estado" id="">
                <option value="ES">Espírito Santo</option>
                <option value="MG">Minas Gerais</option>
                <option value="RJ">Rio de Janeiro</option>
            </select><br>

        <label for="extra">Na sua casa tem: <br></label>
        <input type="checkbox" name="extras[]" value="piscina">Piscina<br>
        <input type="checkbox" name="extras[]" value="garagem">Garagem <br>
        <input type="checkbox" name="extras[]" value="jardim">Jardim <br>

        <input type="submit" value="Enviar">
    </form>

    <?php
    if (isset($_POST["nome"]) && isset($_POST["optCivil"])) {
        echo "O nome digitado foi {$_POST['nome']}<br>";
        echo "E o estado civil é {$_POST['optCivil']}<br>";
    }
    if (isset($_POST["estado"])) {
        echo "Estado selecionado: {$_POST['estado']}<br>";
    }
    if (isset($_POST["extras"])) {
        echo "Na sua casa tem: <br>";
        // for ($i = 0; $i < $_POST["extras"].length; $i++) {
        //     echo $_POST["extras"][$i];
        // }

        foreach ($_POST["extras"] as $extra) {
            echo $extra;
        }
    }
    ?>

</body>
</html>