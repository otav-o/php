<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Aula 01</title>
    <meta charset="utf-8">
  </head>
  <body>
    <h1>Boa Noite</h1>
    
    <?php
    $qntNumeros = 20;
        for($a=1;$a<=$qntNumeros;$a++){
            $aux = $a * $a;
            echo "O quadrado de $a é $aux";
            echo "<br/>";
        }
    ?>

  </body>
</html>