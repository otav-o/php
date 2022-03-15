<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Atividade</title>
	<style>
		p {
			margin: 2px;
		}
		.enunciado {
			color: red;
		}
		.valor {
			color: green;
			background: yellow;
		}
		.center {
			text-align: center;
		}
	</style>
</head>
<body>
	<p class="enunciado">Utilize o PHP para criar um script que imprime o quadrado dos números de 1 a 20 da seguinte forma:</p>
	<p class="enunciado">O quadrado de 1 é 1"</p>

	<div class="center">
		<?php
			for ($i = 1; $i <= 20; $i++) {
				$raiz = $i * $i;
				echo("<p>O quadrado de <span class='valor'>$i</span> é <span class='valor'>$raiz</span></p>");
			}
		?>
	</div>
</div>
</body>
</html>