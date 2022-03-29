<?php
class Smartphone extends Produto {
  public function imprimeEtiqueta(): string
  {
    return '<p>Tipo: Smartphone <br>
    Código: ' . $this->getCodigo() . '<br>;
    Descrição: ' . $this->getDescricao() . '<br>;
    Quantidade: ' . $this->getQuantidade() . '<br>;
    Preço total: ' . $this->getPrecoTotal() . '<br>';
  }
}
