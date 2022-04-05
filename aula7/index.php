<?php

namespace Mercado;

require_once('Cesta.php');
require_once('Hardware.php');
require_once('Smartphone.php');

// $cesta = new Mercado\Cesta;
use Mercado\Cesta;
use Mercado\Produtos\Hardware;
use Mercado\Smartphone;
use Pascoa\Cesta as CestaPascoa;

spl_autoload_register(function ($classea) {
  $file = $classe.".php";
  if(file_exists($file)){
    require_once($file);
  }
})


// use não é obrigatório
$cesta = new Cesta;

$cesta->adicionaItem(
  new Hardware(001, 'HD', 10, 2000)
);

$cesta->adicionaItem(
  new Hardware(002, 'Monitor', 5, 1300)
);

$cesta->adicionaItem(
  new Smartphone(8, 'Xiaom', 2, 20000)
);

$cesta->adicionaItem(
  new Smartphone(020, 'Motorola', 20, 2000)
);

echo 'oi';
var_dump($cesta);
echo $cesta->calculaTotal();


/* spl_autoload_register(function($class) {
  if (file_exists("App/{$class}.php")) {
    require_once "App/{$class}.php"
    return true;
  }
})*/

// para o autoload, reproduzir a organização lógica entre as pastas também