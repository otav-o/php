<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?= 'oi'; // short open tag 
        echo "olá"
    ?>

    <?php
        for ($i = 10; $i >= 1; $i = $i - 1) {
    ?>
        <p><?=$i?> patinhos foram passear, <br> a mamãe gritou, qua, qua qua<br>mas somente<br>
            <?=$i - 1?> voltaram de lá</p>
    <?php
        }  // executar o html dentro de um for
    ?>

    <h2>Elefantes</h2>


    <?php
        for ($i = 0; $i < 10; $i++) {
            echo getTexto($i);
        }

        function getTexto($n) {
            $return = "";
            if ($n % 2 == 1) { 
                $incomodam = "";
                for ($i = 0; $i < $n; $i++) {
                    $incomodam = $incomodam . "incomodam, ";
                }
                // $incomodam = "incomodam, " * $n;
                $return = "${n} elefantes ${incomodam} muito mais. <br>";
            } else {
                $m = $n == 1 ? "" : "m";
                $return = "${n} elefantes incomoda${m} muita gente. <br>";
            }
            return $return;
        }
    ?>

    <?php
        // Jeito do Gildo

        for ($i = 1; $i != 11; $i++):
            if ($i % 2 != 0): // notação de dois pontos        
    ?>
                <p>
                    <?= $i ?> elefantes incomodam muita gente<br>
                
    <?php
            else:
    ?>
                <?= $i ?> elefantes 
                <?php
                    for ($j = 1; $j <= $i; $j++):
                ?>
                incomodam,
                <?php endfor; ?>
                muito mais</p>
    <?php 
            endif;
        endfor;
    ?>
</body>
</html>