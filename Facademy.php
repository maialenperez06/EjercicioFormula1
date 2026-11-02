<?php

require_once 'Monoplaza.php';
require_once 'F3.php';

class FAcademy extends Monoplaza
{

    private $cvs;

    public function __construct($pNombre, $pNacionalidad, $pNumero, $pEscuderia, $pPuntos, $pCvs)
    {
        parent::__construct($pNombre, $pNacionalidad, $pNumero, $pEscuderia, $pPuntos);
        $this->cvs = $pCvs;
    }

  
    public function getCvs()
    {
        return $this->cvs;
    }

    public function setCvs($pCvs)
    {
        $this->cvs = $pCvs;
    }

  
    public function posicionValida($pPosicion)
    {
        return $pPosicion >= 1 && $pPosicion <= 18;
    }


    public function otorgarPuntos($pPosicion, $pVueltaRapida)
{
    if (!$this->posicionValida($pPosicion)) {
        return false;
    }

    $tabla = [1 => 18, 2 => 15, 3 => 12, 4 => 10, 5 => 8, 6 => 6, 7 => 4, 8 => 2, 9 => 1];

    $puntosOtorgados = 0;
    if (isset($tabla[$pPosicion])) {
        $puntosOtorgados = $tabla[$pPosicion];
    }

    if ($pVueltaRapida && $pPosicion <= 10) {
        $puntosOtorgados++;
    }

    $this->puntos += $puntosOtorgados;
 
}

    public function subirCategoria($pAcademia)
    {
        return new F3($this->nombre, $this->nacionalidad, $this->numeroMonoplaza, $this->escuderia, $this->puntos, $pAcademia);
    }
}