<?php

require_once 'Monoplaza.php';

class F1 extends Monoplaza
{
    private $patrocinadorPrincipal;

    public function __construct($pNombre, $pNacionalidad, $pNumero, $pEscuderia, $pPuntos, $pPatrocinador)
    {
        parent::__construct($pNombre, $pNacionalidad, $pNumero, $pEscuderia, $pPuntos);
        $this->patrocinadorPrincipal = $pPatrocinador;
    }

    public function getPatrocinadorPrincipal()
    {
        return $this->patrocinadorPrincipal;
    }

    public function setPatrocinadorPrincipal($pPatrocinador)
    {
        $this->patrocinadorPrincipal = $pPatrocinador;
    }

  
    public function posicionValida($pPosicion)
    {
        return $pPosicion >= 1 && $pPosicion <= 22;
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

    if ($pVueltaRapida && $pPosicion <= 10) {
        $puntosOtorgados++;
    }

    $this->puntos += $puntosOtorgados;
   
}

}