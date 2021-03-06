<?php

namespace Mercado\Produtos;

use Mercado\Produto;

require_once "Produto.php";

class Eletronico extends Produto
{
  public function __construct($codigo, $descricao, $precoTotal, $quantidade)
  {
    $this->setCodigo($codigo);
    $this->setQuantidade($quantidade);
    $this->setDescricao($descricao);
    $this->setPrecoTotal($precoTotal);
  }

  public function imprimeEtiqueta(): string
  {
    return '<p>Tipo: Hardware <br>
    Código: ' . $this->getCodigo() . '<br>;
    Descrição: ' . $this->getDescricao() . '<br>;
    Quantidade: ' . $this->getQuantidade() . '<br>;
    Preço total: ' . $this->getPrecoTotal() . '<br>';
  }
}
