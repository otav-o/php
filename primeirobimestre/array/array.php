<?php

$vetor = array(1, 12, 45, 10, 12, 150, 3.4, "Gildo", true, 0.5, 43.3);

echo count($vetor)."<br>";
print_r($vetor);

echo "Array como fila. array_shift(vetor) remove e retorna o primeiro elemnto.";
$valor = array_shift($vetor); // pega o primeiro elemento de um vetor, remove e retorna.
// array_shift() // comportamento de uma fila. Remove o primeiro elemento

echo "Primeiro elemento: {$valor}. <br>Como ficou o array: {$vetor}";

// array_pop() tira do final do array. Pilha
$valor = array_pop($vetor);
echo "Último elemento: {$valor}. <br>Como ficou o array: {$vetor}";

// olhar no manual do PHP
array_push($vetor, '1000', 5, 102); // insere no final

echo "Como ficou o array após o array_push: {$vetor}<br>";


// Busca e pesquisa
var_dump(in_array(465, $vetor)); // retorna booleano
var_dump(array_search(12, $vetor));

// array_reverse()
// sort() não retorna o vetor. Pega por referência
// shuffle()
// array_merge(), array_intersect(), array_slice(), range()


$vetor = array("1" => 'um', 7 => "sete", 4 => "quatro");
sort($vetor);
echo $vetor;


// melhor forma de imprimir os valores de um array é por um foreach

foreach ($vetor as $valor) {
    echo "<p> $valor </p>";
}

$vetor = array('nome' => 'José', 'sobrenome' => 'Silva', 'matricula' => 123456, 'nascimento' => '10/03/1945');

foreach ($vetor as $chave => $valor) {
    echo "<p> $chave : $valor </p>";
}