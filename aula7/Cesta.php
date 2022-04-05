<?php

namespace Mercado {
  class Cesta
  {
    private $itens = array();
    // private array $itens;

    public function adicionaItem(Produto $p)
    {
      // array_push($this->itens, $p);
      $this->itens[] = $p;
    }

    public function exibeLista(): string
    {
      $return = "";

      foreach ($this->itens as $item) {
        $item->imprimeEtiqueta();
      }

      return $return;
    }

    public function calculaTotal()
    {
      $total = 0;
      foreach ($this->itens as $item) {
        $total += $item->getPrecoTotal();
      }
      return $total;
    }
  }
}
