<?php
include_once("AccesoDatos.php");
include_once("formularioC.php");
include_once("formularioD.php");
include_once("vivienda.php");
include_once("usuario.php");

class operacionesFormularioD extends formularioD
{
    private $nIdFormularioD = 0;

    function setnIdFormularioD($pnIdFormularioD)
    {
        $this->nIdFormularioD = $pnIdFormularioD;
    }

    function getnIdFormularioD()
    {
        return $this->nIdFormularioD;
    }

    function buscar()
    {
        $oAccesoDatos = new AccesoDatos();
        $sQuery = "";
        $arrRS = null;
        $bRet = false;
        if ($this->nIdFormularioD == 0)
            throw new Exception("operacionesFormularioD->buscar(): faltan datos");
        else {
            if ($oAccesoDatos->conectar()) {
                $sQuery = "SELECT idFormulario,fNombre,fApePat,fApeMat,
                fEmail,fComentario,fTel, fIdProyecto1
                FROM formulario
                Where idFormulario = " . $this->nIdFormularioD;
                $arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
                $oAccesoDatos->desconectar();
                if ($arrRS) {
                    $this->fidFormulario = $arrRS[0][0];
                    $this->fNombre = $arrRS[0][1];
                    $this->fApePat = $arrRS[0][2];
                    $this->fApeMat = $arrRS[0][3];
                    $this->fEmail = $arrRS[0][4];
                    $this->fComentario = $arrRS[0][5];
                    $this->fTel = $arrRS[0][6];
                    $this->fIdProyecto = $arrRS[0][7];
                    $bRet = true;
                }
            }
        }
        return $bRet;
    }

    function insertar()
    {
        $oAccesoDatos = new AccesoDatos();
        $sQuery = "";
        $nAfectados = -1;



        if (
            $this->fNombre == "" or $this->fApePat == "" or
            $this->fApeMat == "" or $this->fEmail == "" or
            $this->fComentario == "" or $this->fTel == "" or
            $this->fIdProyecto == 0


        ) {
            throw new Exception("operacionesFormularioD->insertar(): faltan datos");
        } else {
            if ($oAccesoDatos->conectar()) {

                $sQuery = "INSERT INTO telefonosf(fTel1, fTel2) 
                VALUES ('" . $this->fTel . "','" . $this->fTel2 . "');";


                $nAfectados = $oAccesoDatos->ejecutarComando($sQuery);

                /*$sQuery = "INSERT INTO tipop(fIdProyecto) 
                VALUES (" . $this->fIdProyecto . ");";
                $nAfectados = $oAccesoDatos->ejecutarComando($sQuery);*/

                $sQuery = "INSERT INTO formulario(fNombre, fApePat, fApeMat
                , fEmail, fComentario, fIdProyecto1, fTel) 
                VALUES ('" . $this->fNombre . "','" . $this->fApePat . "',
                '" . $this->fApeMat . "','" . $this->fEmail . "','" . $this->fComentario . "',
                " . $this->fIdProyecto . ", '" . $this->fTel . "');";
                $nAfectados = $oAccesoDatos->ejecutarComando($sQuery);

                $oAccesoDatos->desconectar();
            }
        }

        return $nAfectados;
    }

    function modificar()
    {
        $oAccesoDatos = new AccesoDatos();
        $sQuery = "";
        $nAfectados = -1;

        if (
            $this->fNombre == "" or $this->fApePat == "" or
            $this->fApeMat == "" or $this->fEmail == "" or
            $this->fComentario == "" or $this->fTel == "" or
            $this->fIdProyecto == 0
        ) {
            throw new Exception("operacionesFormularioD->modificar(): faltan datos");
        } else {
            if ($oAccesoDatos->conectar()) {
                $sQuery = "UPDATE formulario
                SET fNombre = '" . $this->fNombre . "',
                fApePat = '" . $this->fApePat . "',
                fApeMat = '" . $this->fApeMat . "',
                fEmail = '" . $this->fEmail . "',
                fComentario = '" . $this->fComentario . "',
                fIdProyecto1 = " . $this->fIdProyecto . "
                WHERE idFormulario = " . $this->nIdFormularioD;

                $nAfectados = $oAccesoDatos->ejecutarComando($sQuery);
                $oAccesoDatos->desconectar();
            }
        }
        return $nAfectados;
    }

    function borrar()
    {
        $oAccesoDatos = new AccesoDatos();
        $sQuery = "";
        $nAfectados = -1;
        $telefono = null;
        if ($this->nIdFormularioD==0){
			throw new Exception("operacionesFormularioD->borrar(): faltan datos");;
        } else {
            if ($oAccesoDatos->conectar()) {     

                $sQuery = "SELECT fTel
                FROM formulario
                Where idFormulario = " . $this->nIdFormularioD;
                $arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
                
                if ($arrRS) {
                    $this->telefono = $arrRS[0][0];
                }
                
                $sQuery = "DELETE FROM formulario WHERE idFormulario = " . $this->nIdFormularioD;
                $nAfectados = $oAccesoDatos->ejecutarComando($sQuery);

                $sQuery = "DELETE FROM telefonosf WHERE `telefonosf`.`fTel1` =" .$this->telefono;
                $nAfectados = $oAccesoDatos->ejecutarComando($sQuery);
                
                $oAccesoDatos->desconectar();
            }
        }
        return $nAfectados;
    }

    function buscarTodos()
    {
        $oAccesoDatos = new AccesoDatos();
        $sQuery = "";
        $arrRS = null;
        $aLinea = null;
        $j = 0;
        $oFormularioD = null;
        $arrResultado = false;

        if ($oAccesoDatos->conectar()) {
            $sQuery = "SELECT idFormulario ,fNombre,fApePat,fApeMat,
                fEmail,fComentario,fIdProyecto1,fTel
                FROM formulario
                ORDER BY idFormulario";
            $arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
            $oAccesoDatos->desconectar();
            if ($arrRS) {
                foreach ($arrRS as $aLinea) {
                    $oFormularioD = new operacionesFormularioD();
                    $oFormularioD->setfIdFormulario($aLinea[0]);
                    $oFormularioD->setfNombre($aLinea[1]);
                    $oFormularioD->setfApePat($aLinea[2]);
                    $oFormularioD->setfApeMat($aLinea[3]);
                    $oFormularioD->setfEmail($aLinea[4]);
                    $oFormularioD->setfComentario($aLinea[5]);
                    $oFormularioD->setfIdProyecto($aLinea[6]);
                    $oFormularioD->setfTel($aLinea[7]);
                   
                    if(!is_array($arrResultado)) $arrResultado = [ ];
                    $arrResultado[$j] = $oFormularioD;
                    $j = $j + 1;
                }
            } else {
                $arrResultado = false;
            }
        }
        return $arrResultado;
    }
}

//CREDITO-----------------------------------------


class operacionesFormularioC extends formularioc
{
    private $nIdFormularioC = 0;

    function setnIdFormularioC($pnIdFormularioC)
    {
        $this->nIdFormularioC = $pnIdFormularioC;
    }

    function getnIdFormularioC()
    {
        return $this->nIdFormularioC;
    }

    function buscar()
    {
        $oAccesoDatos = new AccesoDatos();
        $sQuery = "";
        $arrRS = null;
        $bRet = false;
        if ($this->nIdFormularioC == 0)
            throw new Exception("operacionesFormularioC->buscar(): faltan datos");
        else {
            if ($oAccesoDatos->conectar()) {
                $sQuery = "SELECT idCredito,cNombre,cApePat,cApeMat,
                cCurp,cNImss,cCodCre1,cTel
                FROM credito
                Where idCredito = " . $this->nIdFormularioC;
                $arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
                $oAccesoDatos->desconectar();
                if ($arrRS) {
                    $this->cidCredito = $arrRS[0][0];
                    $this->cNombre = $arrRS[0][1];
                    $this->cApePat = $arrRS[0][2];
                    $this->cApeMat = $arrRS[0][3];
                    $this->cCurp = $arrRS[0][4];
                    $this->cNoImss = $arrRS[0][5];
                    $this->cCodCre = $arrRS[0][6];
                    $this->cTel = $arrRS[0][7];
                    $this->cTel2 = $arrRS[0][8];
                    $bRet = true;
                }
            }
        }
        return $bRet;
    }

    function insertar()
    {
        $oAccesoDatos = new AccesoDatos();
        $sQuery = "";
        $nAfectados = -1;

        if (
            $this->cNombre == "" or
            $this->cApePat == "" or $this->cCurp == "" or
            $this->cNoImss == "" or $this->cTel == "" or
            $this->cCodCre == 0
        ) {
            throw new Exception("operacionesFormularioC->insertar(): faltan datos");
        } else {
            if ($oAccesoDatos->conectar()) {

                $sQuery = "INSERT INTO telefonosc(cTel1, cTel2) 
                VALUES ('" . $this->cTel . "','" . $this->cTel2 . "');";
                $nAfectados = $oAccesoDatos->ejecutarComando($sQuery);

                /*$sQuery = "INSERT INTO tipoc(cCodCre) 
                VALUES (" . $this->cCodCre . ");";
                $nAfectados = $oAccesoDatos->ejecutarComando($sQuery);*/

                $sQuery = "INSERT INTO credito(cNombre, cApePat, cApeMat
                , cCurp, cNImss, cCodCre1, cTel) 
                VALUES ('" . $this->cNombre . "','" . $this->cApePat . "',
                '" . $this->cApeMat . "','" . $this->cCurp . "','" . $this->cNoImss . "',
                " . $this->cCodCre . ", '" . $this->cTel . "');";
                $nAfectados = $oAccesoDatos->ejecutarComando($sQuery);

                $oAccesoDatos->desconectar();
            }
        }

        return $nAfectados;
    }

    function modificar()
    {
        $oAccesoDatos = new AccesoDatos();
        $sQuery = "";
        $nAfectados = -1;

        if (
            $this->cNombre == "" or
            $this->cApePat == "" or $this->cCurp == "" or
            $this->cNoImss == "" or $this->cTel == "" or
            $this->cCodCre == 0
        ) {
           
            throw new Exception("operacionesFormularioC->modificar(): faltan datos");
        } else {
            if ($oAccesoDatos->conectar()) {
                
                $sQuery = "UPDATE credito
                SET cNombre = '" . $this->cNombre . "',
                cApePat = '" . $this->cApePat . "',
                cApeMat = '" . $this->cApeMat . "',
                cCurp = '" . $this->cCurp . "',
                cNImss = '" . $this->cNoImss . "',
                cCodCre1 = " . $this->cCodCre . ",
                cTel = '" . $this->cTel . "'
                WHERE idCredito = " . $this->nIdFormularioC;
                $nAfectados = $oAccesoDatos->ejecutarComando($sQuery);
                $oAccesoDatos->desconectar();
            }
        }
        return $nAfectados;
    }

    function borrar()
    {
        $oAccesoDatos = new AccesoDatos();
        $sQuery = "";
        $nAfectados = -1;
        $telefono = null;
        if (
            $this->nIdFormularioC==0
        ) {
            throw new Exception("operacionesFormularioC->borrar(): faltan datos");
        } else {
            if ($oAccesoDatos->conectar()) {   
                $sQuery = "SELECT cTel
                FROM credito
                Where idCredito = " . $this->nIdFormularioC;
                $arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
                if ($arrRS) {
                    $this->telefono = $arrRS[0][0];
                }
                $sQuery = "DELETE FROM credito WHERE idCredito = " . $this->nIdFormularioC;
                $nAfectados = $oAccesoDatos->ejecutarComando($sQuery);

                $sQuery = "DELETE FROM telefonosc WHERE `telefonosc`.`cTel1` = " . $this->telefono;
                $nAfectados = $oAccesoDatos->ejecutarComando($sQuery);

                $oAccesoDatos->desconectar();
            }
        }
        return $nAfectados;
    }

    function buscarTodos()
    {
        $oAccesoDatos = new AccesoDatos();
        $sQuery = "";
        $arrRS = null;
        $aLinea = null;
        $j = 0;
        $oFormularioC = null;
        $arrResultado = false;

        if ($oAccesoDatos->conectar()) {
            $sQuery = "SELECT idCredito, cNombre, cApePat, cApeMat
            , cCurp, cNImss, cCodCre1, cTel
                FROM credito
                ORDER BY idCredito";
            $arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
            $oAccesoDatos->desconectar();
            if ($arrRS) {
                foreach ($arrRS as $aLinea) {
                    $oFormularioC = new operacionesFormularioC();
                    $oFormularioC->setcidCredito($aLinea[0]);
                    $oFormularioC->setcNombre($aLinea[1]);
                    $oFormularioC->setcApePat($aLinea[2]);
                    $oFormularioC->setcApeMat($aLinea[3]);
                    $oFormularioC->setcCurp($aLinea[4]);
                    $oFormularioC->setcNoImss($aLinea[5]);
                    $oFormularioC->setcCodCre($aLinea[6]);
                    $oFormularioC->setcTel($aLinea[7]);
                    

                    if(!is_array($arrResultado)) $arrResultado = [ ];

                    $arrResultado[$j] = $oFormularioC;
                    $j = $j + 1;
                }
            } else {
                $arrResultado = false;
            }
        }
        return $arrResultado;
    }
}


//VIVIENDA

class operacionesVivienda extends vivienda
{
    private $nIdVivienda = 0;

    function setnIdVivienda($pnIdVivienda)
    {
        $this->nIdVivienda = $pnIdVivienda;
    }

    function getnIdVivienda()
    {
        return $this->nIdVivienda;
    }

    function buscar()
    {
        $oAccesoDatos = new AccesoDatos();
        $sQuery = "";
        $arrRS = null;
        $bRet = false;
        if ($this->nIdVivienda == 0)
            throw new Exception("operacionesVivienda->buscar(): faltan datos");
        else {
            if ($oAccesoDatos->conectar()) {
                $sQuery = "SELECT idVivienda,vNHabi,vNPisos,vMedidas,
                vPrecio,vIdZona1,vIdProt1
                FROM vivienda
                Where idVivienda = " . $this->nIdVivienda;
                $arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
                $oAccesoDatos->desconectar();
                if ($arrRS) {
                    $this->vidVivienda = $arrRS[0][0];
                    $this->vNHabi = $arrRS[0][1];
                    $this->vNPisos = $arrRS[0][2];
                    $this->vMedidas = $arrRS[0][3];
                    $this->vPrecio = $arrRS[0][4];
                    $this->vIdZona = $arrRS[0][5];
                    $this->vIdProt = $arrRS[0][6];
                    $bRet = true;
                }
            }
        }
        return $bRet;
    }

    function insertar()
    {
        $oAccesoDatos = new AccesoDatos();
        $sQuery = "";
        $nAfectados = -1;

        if (
            $this->vNHabi == "" or
            $this->vNPisos == "" or $this->vMedidas == "" or
            $this->vPrecio == "" or $this->vIdZona == 0 or
            $this->vIdProt == 0
        ) {
            throw new Exception("operacionesVivienda->insertar(): faltan datos");
        } else {
            if ($oAccesoDatos->conectar()) {

                $sQuery = "INSERT INTO vivienda(vNHabi, vNPisos, vMedidas
                , vPrecio, vIdZona1, vIdProt1) 
                VALUES ('" . $this->vNHabi . "','" . $this->vNPisos . "',
                '" . $this->vMedidas . "','" . $this->vPrecio . "'," . $this->vIdZona . ",
                " . $this->vIdProt . ");";
                $nAfectados = $oAccesoDatos->ejecutarComando($sQuery);

                $oAccesoDatos->desconectar();
            }
        }

        return $nAfectados;
    }

    function modificar()
    {
        $oAccesoDatos = new AccesoDatos();
        $sQuery = "";
        $nAfectados = -1;

        if (
            $this->vNHabi == "" or
            $this->vNPisos == "" or $this->vMedidas == "" or
            $this->vPrecio == "" or $this->vIdZona == 0 or
            $this->vIdProt == 0
        ) {
            throw new Exception("operacionesVivienda->modificar(): faltan datos");
        } else {
            if ($oAccesoDatos->conectar()) {
                $sQuery = "UPDATE vivienda
                SET vNHabi = '" . $this->vNHabi . "',
                vNPisos = '" . $this->vNPisos . "',
                vMedidas = '" . $this->vMedidas . "',
                vPrecio = '" . $this->vPrecio . "',
                vIdZona1 = '" . $this->vIdZona . "',
                vIdProt1 = " . $this->vIdProt . "
                WHERE idVivienda = " . $this->nIdVivienda;

                $nAfectados = $oAccesoDatos->ejecutarComando($sQuery);
                $oAccesoDatos->desconectar();
            }
        }
        return $nAfectados;
    }

    function borrar()
    {
        $oAccesoDatos = new AccesoDatos();
        $sQuery = "";
        $nAfectados = -1;

        if (
            $this->nIdVivienda==0
        ) {
            throw new Exception("operacionesVivienda->borrar(): faltan datos");
        } else {
            if ($oAccesoDatos->conectar()) {
                $sQuery = "DELETE FROM vivienda WHERE idVivienda = " . $this->nIdVivienda;
                $nAfectados = $oAccesoDatos->ejecutarComando($sQuery);
                $oAccesoDatos->desconectar();
            }
        }
        return $nAfectados;
    }

    function buscarTodos()
    {
        $oAccesoDatos = new AccesoDatos();
        $sQuery = "";
        $arrRS[] = null;
        $aLinea = null;
        $j = 0;
        $oVivienda = null;
        $arrResultado = false;

        if ($oAccesoDatos->conectar()) {
            $sQuery = "SELECT idVivienda ,vNHabi, vNPisos, vMedidas
            , vPrecio, vIdProt1,  vIdZona1
                FROM vivienda
                ORDER BY idVivienda";
            $arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
            $oAccesoDatos->desconectar();



            if ($arrRS) {
                foreach ($arrRS as $aLinea) {
                    $oVivienda = new vivienda();
                    $oVivienda->setvidVivienda($aLinea[0]);
                    $oVivienda->setvNHabi($aLinea[1]);
                    $oVivienda->setvNPisos($aLinea[2]);
                    $oVivienda->setvMedidas($aLinea[3]);
                    $oVivienda->setvPrecio($aLinea[4]);
                    $oVivienda->setvIdZona($aLinea[5]);
                    $oVivienda->setvIdProt($aLinea[6]);
                    /*if(isset($_GET['name'])): ?>
                    Your name is <?php echo $_GET["name"]; ?> */

                    if(!is_array($arrResultado)) $arrResultado = [ ];
                    $arrResultado[$j] = $oVivienda;

                    $j = $j + 1;
                }
            } else {
                $arrResultado = null;
            }
        }
        return $arrResultado;
    }
}

class operacionesUsuario extends usuario{
    private $nTipo=0;
	private $nIdPersonal=0;
	
	//Constantes para mejor lectura de código
	CONST TIPO_ADMON = 1;
   
    function setTipo($pnTipo){
       $this->nTipo = $pnTipo;
    }
    function getTipo(){
       return $this->nTipo;
    }
   
    function setIdPersonal($pnIdPersonal){
       $this->nIdPersonal = $pnIdPersonal;
    }   
    function getIdPersonal(){
       return $this->nIdPersonal;
    }

    function buscar()
    {
        $oAccesoDatos = new AccesoDatos();
        $sQuery = "";
        $arrRS = null;
        $bRet = false;
        if ($this->nIdPersonal == 0)
            throw new Exception("operacionesUsuario->buscar(): faltan datos");
        else {
            if ($oAccesoDatos->conectar()) {
                $sQuery = "SELECT uCve,uContra,uIdPersonal
                FROM usuario
                Where uCve = " . $this->nIdPersonal;
                $arrRS = $oAccesoDatos->ejecutarConsulta($sQuery);
                $oAccesoDatos->desconectar();
                if ($arrRS) {
                    $this->oPersonal = $arrRS[0][0];
                    $this->nClave = $arrRS[0][1];
                    $this->sPwd = $arrRS[0][2];
                    $bRet = true;
                }
            }
        }
        return $bRet;
    }
}
?>