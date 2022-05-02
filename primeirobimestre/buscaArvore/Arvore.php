<?php
require_once "No.php";

class Arvore{
    private $raiz;

    public function __construct(No $raiz)
    {
        $this->raiz = $raiz;
    }

    public function buscaLargura($valorBuscado)
    {
        $fila = Array();
        array_push($fila,$this->raiz);  
           
        while(count($fila) != 0){       
            $noAtual = array_shift($fila);       
            if($noAtual->getValor() == $valorBuscado){
                echo "Valor {{$valorBuscado}} foi enconstrado!<br>";
                return true;
            }else{
                foreach($noAtual->getFilhos() as $filho){
                    array_push($fila,$filho);
                }
                array_shift($fila);
            }
        }
        echo "Valor {{$valorBuscado}} não foi enconstrado! <br>";
        return false;
    }

    public function buscaProfundidade($valorBuscado)
    {
        $pilha = Array ($this ->raiz);
        while(count($pilha) != 0){
            $topo = array_pop($pilha);
            if($topo->getValor() == $valorBuscado){
                echo "Valor {$valorBuscado} foi enconstrado!";
                return true;
            }else{
                foreach($topo->getFilhos() as $filho){
                    array_push($pilha,$filho);
                }
            }
        }
        echo "Valor {$valorBuscado}não foi enconstrado!";
        return false;
    }
    public function imprimeArvore()
    {
        $fila = Array();
        array_push($fila,$this->raiz);  
           
        while(count($fila) != 0){       
            $noAtual = array_shift($fila);
            echo $noAtual->getValor()." ";
                foreach($noAtual->getFilhos() as $filho){
                    array_push($fila,$filho);
                    echo " - ".$filho->getValor(). " - ";
                }
                echo "<br>";
                
            }
        }
    }
