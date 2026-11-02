<?php

abstract class Monoplaza
{

    protected $nombre;
    protected $nacionalidad;
    protected $numeroMonoplaza;
    protected $escuderia;
    protected $puntos;

    public function __construct($pNombre, $pNacionalidad, $pNumero, $pEscuderia, $pPuntos)
    {
        $this->nombre = $pNombre;
        $this->nacionalidad = $pNacionalidad;
        $this->numeroMonoplaza = $pNumero;
        $this->escuderia = $pEscuderia;
        $this->puntos = $pPuntos;
    }

    
    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($pNombre)
    {
        $this->nombre = $pNombre;
    }

    public function getNacionalidad()
    {
        return $this->nacionalidad;
    }

    public function setNacionalidad($pNacionalidad)
    {
        $this->nacionalidad = $pNacionalidad;
    }

    public function getNumeroMonoplaza()
    {
        return $this->numeroMonoplaza;
    }

    public function setNumeroMonoplaza($pNumero)
    {
        $this->numeroMonoplaza = $pNumero;
    }

    public function getEscuderia()
    {
        return $this->escuderia;
    }

    public function setEscuderia($pEscuderia)
    {
        $this->escuderia = $pEscuderia;
    }

    public function getPuntos()
    {
        return $this->puntos;
    }

    

    abstract public function posicionValida($pPosicion);
    abstract public function otorgarPuntos($pPosicion, $pVueltaRapida);
}