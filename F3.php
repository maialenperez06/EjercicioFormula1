<?php

require_once 'Monoplaza.php';
require_once 'F2.php';

class F3 extends Monoplaza
{

    private $academia;


    public function __construct($pNombre, $pNacionalidad, $pNumero, $pEscuderia, $pPuntos, $pAcademia)
    {
        parent::__construct($pNombre, $pNacionalidad, $pNumero, $pEscuderia, $pPuntos);
        $this->academia = $pAcademia;
    }

    public function getAcademia()
    {
        return $this->academia;
    }

    public function setAcademia($pAcademia)
    {
        $this->academia = $pAcademia;
    }

    public function posicionValida($pPosicion)
    {
        return $pPosicion >= 1 && $pPosicion <= 30;
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

    $this->puntos += $puntosOtorgados;
    
}

    public function subirCategoria($pPuntosMinimos)
    {
        return new F2($this->nombre, $this->nacionalidad, $this->numeroMonoplaza, $this->escuderia, $this->puntos, $pPuntosMinimos);
    }
}