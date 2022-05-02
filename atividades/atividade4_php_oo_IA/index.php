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

$s->setFilhos(array('3.1' => $a, '4.9' => $d));
$a->setFilhos(array('3.1' => $b));
$b->setFilhos(array('3.5' => $c, '5.1' => $f));
$c->setFilhos(array('4.8' => $t));
$d->setFilhos(array('2.2' => $e));
$e->setFilhos(array('2.2' => $f));
$f->setFilhos(array('2.2' => $g));
$g->setFilhos(array('2.5' => $t));

$arvore = new Arvore($a);

$ordem = $b->getOrdenados();
foreach ($ordem as $no) {
  echo $no->getValor() . "<br>";
}
//$arvore->buscaLargura('G');
//$arvore->buscaProfundidade('H');
$arvore->imprimeArvore();
