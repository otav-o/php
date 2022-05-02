<?php


// Feito na aula do dia 28/04/2022, quinta

class Rastreador
{
  // anterior, filho e custo
  private $origem;
  private $destino;
  private $custo;

  public function __construct($destino = null, $origem = null, $custo = 0)
  {
    $this->origem = $origem;
    $this->destino = $destino;
    $this->custo = $custo;
  }

  public function getOrigem()
  {
    return $this->origem;
  }

  public function getDestino()
  {
    return $this->destino;
  }

  public function getCusto()
  {
    return $this->custo;
  }
}
