<?php
echo 'POST: ';
var_dump($_POST); // o PHP já cria este array
echo '<br> GET: ';
var_dump($_GET);
echo '<br> REQUEST: ' . var_dump($_REQUEST); // tanto post, quanto get

// nunca usamos o request, por questão de segurança. Precisa-se saber qual método se está utilizando, é muito importante saber como os dados do formulário chegaram.

echo '<br><br>';

echo "O nome do usuário é " . $_GET['nome'] . " e o sobrenome é " . $_GET['sobrenome'] . "<br><br>";


