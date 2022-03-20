<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    <h1 class="h1">O maior valor é <?= maiorValor(13, 10); ?>

    <?php
        $a = 10;
        $b = 20;

        echo maiorValor($a, $b);
        // Passar por referência: E comercial (&) na assinatura do método e no uso dele
        echo maiorValor($a, $b);




        function maiorValor(&$var1, &$var2) {
            if ($var1 > $var2) {
                $var1 = 0;
                $var2 = 0;
                return $var1;
            }
            else if ($var2 > $var1) {
                $var1 = 0;
                $var2 = 0;
                return $var2;
            }
            else {
                $var1 = 0;
                $var2 = 0;
                return false;
            }
        }

        // function maiorValor($var1) {
        // Não é possível, mesmo com assinatura diferente

        var_dump($a, $b)


    ?>
</body>
</html>