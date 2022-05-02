<?php

require_once "Arvore.php";

$a = new No('A');
$b = new No('B');
$c = new No('C');
$d = new No('D');
$e = new No('E');
$f = new No('F');
$g = new No('G');
$h = new No('H');
$i = new No('I');
$j = new No('J');
$k = new No('K');

$a->setFilhos(array($b, $c, $d));
$b->setFilhos(array($e, $f));
$c->setFilhos(array($g, $h));
$d->setFilhos(array($i, $j, $k));

$arvore = new Arvore($a);

$ordem = $b->getOrdenados();
foreach ($ordem as $no) {
  echo $no->getValor() . "<br>";
}
//$arvore->buscaLargura('G');
//$arvore->buscaProfundidade('H');
$arvore->imprimeArvore();


function buscaMelhorEscolha(No $origem, No $meta, $distancia) {
  var fila = new Fila
}