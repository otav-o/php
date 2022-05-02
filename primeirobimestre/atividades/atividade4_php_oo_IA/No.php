<?php

class No
{
    private $valor = '';
    private $filhos = array();

    function __construct($valor)
    {
        $this->valor = $valor;
    }
    public function adicionarFilho(No $filho, $custoAteFilho)
    {
        $this->filhos["$custoAteFilho"] = $filho; // array associativo
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
    public function getOrdenados()
    {
        $filhos = $this->getFilhos();
        $ordenados = array();
        foreach ($filhos as $filho) {
            $ordenados["$filho->getHeuristica()"] = $filho; // forçar a ser uma string
        }
        ksort($ordenados);
        return $ordenados;
    }
}
