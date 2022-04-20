<?php

class No
{
    private $valor = '';
    private $filhos = array();

    function __construct($valor)
    {
        $this->valor = $valor;
    }
    public function adicionarFilho(No $filhos)
    {
        $this->filhos[] = $filhos;
    }
    public function getValor()
    {
        return $this->valor;
    }
    public function setValor($valor)
    {
        $this->valor = $valor;
    }
    public function getFilhos()
    {
        return $this->filhos;
    }
    public function setFilhos($filhos)
    {
        $this->filhos = $filhos;
    }
}
