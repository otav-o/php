<?php
// GET E PUT

// Tudo o que o cliente quer na requisição GET está no cabeçalho
// Mas, no POST, não é tudo de uma vez. Primeiro, estabelece-se a conexão, depois o servidor responde, aí o cliente diz o que quer.
// Requisição get pode estar com o parâmetro de busca na URL. Pesquisar um produto em um marketplace é GET
// Login: POST, não está na url

// GET (é mais rápido)
// https://url/processa.php?nomeVariavel=valorVariavel&var2=val2

// http://localhost/formulario/processa.php?nome=Bom+dia