<?php

class formularioD
{
    protected $fidFormulario = "";
    protected $fNombre = "";
    protected $fApePat = "";
    protected $fApeMat = "";
    protected $fEmail = "";
    protected $fComentario = "";
    protected $fTel = "";
    protected $fTel2 = "";
    protected $fIdProyecto = "";

    function setfIdFormulario($pfidFormulario)
    {
        $this->fidFormulario = $pfidFormulario;
    }

    function getfIdFormulario(){
        return $this->fidFormulario;
    }


    function setfNombre($pfNombre)
    {
        $this->fNombre = $pfNombre;
    }

    function getfNombre(){
        return $this->fNombre;
    }

    function setfApePat($pfApePat)
    {
        $this->fApePat = $pfApePat;
    }

    function getfApePat(){
        return $this->fApePat;
    }

    function setfApeMat($pfApeMat)
    {
        $this->fApeMat = $pfApeMat;
    }

    function getfApeMat(){
        return $this->fApeMat;
    }

    function setfEmail($pfEmail)
    {
        $this->fEmail = $pfEmail;
    }

    function getfEmail(){
        return $this->fEmail;
    }

    function setfComentario($pfComentario)
    {
        $this->fComentario = $pfComentario;
    }

    function getfComentario(){
        return $this->fComentario;
    }

    function setfTel($pfTel)
    {
        $this->fTel = $pfTel;
    }

    function getfTel(){
        return $this->fTel;
    }

    function setfTel2($pfTel2)
    {
        $this->fTel2 = $pfTel2;
    }

    function getfTel2(){
        return $this->fTel2;
    }

    function setfIdProyecto($pfIdProyecto)
    {
        $this->fIdProyecto = $pfIdProyecto;
    }

    function getfIdProyecto(){
        return $this->fIdProyecto;
    }
}
?>