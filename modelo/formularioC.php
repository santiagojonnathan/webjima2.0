<?php

class formularioc
{
    protected $cidCredito = "";
    protected $cNombre = "";
    protected $cApePat = "";
    protected $cApeMat = "";
    protected $cCurp = "";
    protected $cNoImss = "";
    protected $cCodCre = "";
    protected $cTel = "";
    protected $cTel2 = "";
    

    function setcidCredito($pcidCredito)
    {
        $this->cidCredito = $pcidCredito;
    }

    function getcidCredito(){
        return $this->cidCredito;
    }


    function setcNombre($pcNombre)
    {
        $this->cNombre = $pcNombre;
    }

    function getcNombre(){
        return $this->cNombre;
    }

    function setcApePat($pcApePat)
    {
        $this->cApePat = $pcApePat;
    }

    function getcApePat(){
        return $this->cApePat;
    }

    function setcApeMat($pcApeMat)
    {
        $this->cApeMat = $pcApeMat;
    }

    function getcApeMat(){
        return $this->cApeMat;
    }

    function setcCurp($pcCurp)
    {
        $this->cCurp = $pcCurp;
    }

    function getcCurp(){
        return $this->cCurp;
    }

    function setcNoImss($pcNoImss)
    {
        $this->cNoImss = $pcNoImss;
    }

    function getcNoImss(){
        return $this->cNoImss;
    }

    function setcTel($pcTel)
    {
        $this->cTel = $pcTel;
    }

    function getcTel(){
        return $this->cTel;
    }

    function setcTel2($pcTel2)
    {
        $this->cTel2 = $pcTel2;
    }

    function getcTel2(){
        return $this->cTel2;
    }

    function setcCodCre($pcCodCre)
    {
        $this->cCodCre = $pcCodCre;
    }

    function getcCodCre(){
        return $this->cCodCre;
    }
}
?>