<?php

class vivienda
{
    protected $vidVivienda = "";
    protected $vNHabi = "";
    protected $vNPisos = "";
    protected $vMedidas = "";
    protected $vPrecio = "";
    protected $vIdZona = "";
    protected $vIdProt = "";
    

    function setvidVivienda($pvidVivienda)
    {
        $this->vidVivienda = $pvidVivienda;
    }

    function getvidVivienda(){
        return $this->vidVivienda;
    }


    function setvNHabi($pvNHabi)
    {
        $this->vNHabi = $pvNHabi;
    }

    function getvNHabi(){
        return $this->vNHabi;
    }

    function setvNPisos($pvNPisos)
    {
        $this->vNPisos = $pvNPisos;
    }

    function getvNPisos(){
        return $this->vNPisos;
    }

    function setvMedidas($pvMedidas)
    {
        $this->vMedidas = $pvMedidas;
    }

    function getvMedidas(){
        return $this->vMedidas;
    }

    function setvPrecio($pvPrecio)
    {
        $this->vPrecio = $pvPrecio;
    }

    function getvPrecio(){
        return $this->vPrecio;
    }

    function setvIdZona($pvIdZona)
    {
        $this->vIdZona = $pvIdZona;
    }

    function getvIdZona(){
        return $this->vIdZona;
    }

    function setvIdProt($pvIdProt)
    {
        $this->vIdProt = $pvIdProt;
    }

    function getvIdProt(){
        return $this->vIdProt;
    }

}
?>