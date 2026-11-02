<?php

require_once 'Monoplaza.php';
require_once 'F3.php';

class F4 extends Monoplaza
{

    private $paisCategoria;


    public function __construct($pNombre, $pNacionalidad, $pNumero, $pEscuderia, $pPuntos, $pPaisCategoria)
    {
        parent::__construct($pNombre, $pNacionalidad, $pNumero, $pEscuderia, $pPuntos);
        $this->paisCategoria = $pPaisCategoria;
    }


    public function getPaisCategoria()
    {
        return $this->paisCategoria;
    }

    public function setPaisCategoria($pPaisCategoria)
    {
        $this->paisCategoria = $pPaisCategoria;
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

    $tabla = [1 => 25, 2 => 18, 3 => 15, 4 => 12, 5 => 10, 6 => 8, 7 => 6, 8 => 4, 9 => 2, 10 => 1];

    $puntosOtorgados = 0;
    if (isset($tabla[$pPosicion])) {
        $puntosOtorgados = $tabla[$pPosicion];
    }

    $this->puntos += $puntosOtorgados;
   
}

    public function subirCategoria($pAcademia)
    {
        return new F3($this->nombre, $this->nacionalidad, $this->numeroMonoplaza, $this->escuderia, $this->puntos, $pAcademia);
    }
}