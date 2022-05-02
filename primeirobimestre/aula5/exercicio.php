<!-- Monte um formulário para a entrada de um número através de um menu suspenso, e em outra página  mostre o mês correspondente -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="resultado.php" method="post">
        <select name="numero" id="">
        <?php 
            for ($i = 0; $i < 12; $i++)
                echo "<option value='$i'>$i</option>"
        ?>
        </select>
        <input type="submit" value="Enviar número">
    </form>
</body>
</html>