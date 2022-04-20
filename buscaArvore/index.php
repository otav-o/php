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

$a->setFilhos(Array($b,$c,$d));
$b->setFilhos(Array($e,$f));
$c->setFilhos(Array($g,$h));
$d->setFilhos(Array($i,$j,$k));

$arvore = new Arvore($a);

//$arvore->buscaLargura('G');
//$arvore->buscaProfundidade('H');
$arvore->imprimeArvore();