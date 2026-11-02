<?php

require_once 'Monoplaza.php';
require_once 'F1.php';

class F2 extends Monoplaza
{

    private $puntosMinimos;


    public function __construct($pNombre, $pNacionalidad, $pNumero, $pEscuderia, $pPuntos, $pPuntosMinimos)
    {
        parent::__construct($pNombre, $pNacionalidad, $pNumero, $pEscuderia, $pPuntos);
        $this->puntosMinimos = $pPuntosMinimos;
    }


    public function getPuntosMinimos()
    {
        return $this->puntosMinimos;
    }

    public function setPuntosMinimos($pPuntosMinimos)
    {
        $this->puntosMinimos = $pPuntosMinimos;
    }

    
    public function posicionValida($pPosicion)
    {
        return $pPosicion >= 1 && $pPosicion <= 24;
    }

  
   public function otorgarPuntos($pPosicion, $pVueltaRapida)
{
    if (!$this->posicionValida($pPosicion)) {
        return false;
    }

    $tabla = [1 => 10, 2 => 8, 3 => 7, 4 => 6, 5 => 5, 6 => 4, 7 => 3, 8 => 2, 9 => 1];

    $puntosOtorgados = 0;
    if (isset($tabla[$pPosicion])) {
        $puntosOtorgados = $tabla[$pPosicion];
    }

    if ($pVueltaRapida && $pPosicion <= 10) {
        $puntosOtorgados++;
    }

    $this->puntos += $puntosOtorgados;
    
}

   
    public function subirCategoria($pPatrocinador)
    {
        return new F1($this->nombre, $this->nacionalidad, $this->numeroMonoplaza, $this->escuderia, $this->puntos, $pPatrocinador);
    }
}