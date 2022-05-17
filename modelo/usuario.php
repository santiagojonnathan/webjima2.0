<?php
include_once("AccesoDatos.php");
include_once("operacionesBD.php");

class usuario{
    private $nClave = 0;
	private $sPwd = "";
	private $oPersonal = null;
	private $oAD = null;

    public function getPers(){
        return $this->oPersonal;
    }

    public function setPers($valor){
		$this->oPersonal = $valor;
	}

    public function getClave(){
		return $this->nClave;
	}
	public function setClave($valor){
		$this->nClave = $valor;
	}

	public function getPwd(){
		return $this->sPwd;
	}
	public function setPwd($valor){
		$this->sPwd = $valor;
	}

    public function buscarCvePwd(){
        $bRet = false;
        $sQuery = "";
        $arrRS = null;
            if (($this->nClave == 0 || $this->sPwd == "") )
                throw new Exception("Usuario->buscar: faltan datos");
            else{
                $sQuery = "SELECT t1.uIdPersonal 
                           FROM usuario t1
                           WHERE t1.uCve = ".$this->nClave."
                           AND t1.uContra = '".$this->sPwd."'";
                //Crear, conectar, ejecutar, desconectar
                $oAD = new AccesoDatos();
                if ($oAD->conectar()){
                    $arrRS = $oAD->ejecutarConsulta($sQuery);
                    $oAD->desconectar();
                    if ($arrRS != null){
                        $this->oPersonal = new operacionesUsuario();
                        $this->oPersonal->setIdPersonal($arrRS[0][0]);
                        $this->oPersonal->buscar();
                        $bRet = true;
                    }
                }
            }
            return $bRet;
        }

}

?>