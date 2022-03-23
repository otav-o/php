<?php

class Matricula
{
  private int $numero;
  private ?string $data;
  private int $periodo;

  public function __construct(int $numero = 0, ?string $data = "00/00/00", int $periodo)
  {
    $this->numero = $numero;
    $this->data = $data;
    $this->periodo = $periodo;
  }

  public function exibeMatricula()
  {
    echo "<p>";
    echo "Número: {$this->numero}<br>";
    echo "Data: {$this->data}<br>";
    echo "Período: {$this->periodo}<br>";
    echo "</p>";
  }

  public function __destruct()
  {
    echo "Destruindo o objeto matrícula";
  }
}
