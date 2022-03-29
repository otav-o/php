<?php
abstract class Produto
{
  private int $codigo;
  private string $descricao;
  private int $quantidade;
  private float $precoTotal;

  abstract function imprimeEtiqueta(): string;

  public function getCodigo()
  {
    return $this->codigo;
  }

  public function setCodigo($codigo)
  {
    $this->codigo = $codigo;
  }

  public function getDescricao()
  {
    return $this->descricao;
  }

  public function setDescricao($descricao)
  {
    $this->descricao = $descricao;
  }

  public function getQuantidade()
  {
    return $this->quantidade;
  }

  public function setQuantidade($quantidade)
  {
    $this->quantidade = $quantidade;
  }

  public function getPrecoTotal()
  {
    return $this->precoTotal;
  }

  public function setPrecoTotal($preco)
  {
    $this->precoTotal = $preco;
  }
}
