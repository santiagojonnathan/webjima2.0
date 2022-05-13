<?php
include_once("modelo/operacionesBD.php");
    $sErr=""; 

    $oFormularioC = new operacionesFormularioC();

    $oFormularioC->setcNombre($_POST['cNombre']);
    $oFormularioC->setcApePat($_POST['cApePat']);
    $oFormularioC->setcApeMat($_POST['cApeMat']);
    $oFormularioC->setcCurp($_POST['cCurp']);
    $oFormularioC->setcNoImss($_POST['cNoImss']);
    $oFormularioC->setcCodCre($_POST['cCodCre']);
    $oFormularioC->setcTel($_POST['cTel']);
    $oFormularioC->setcTel2($_POST['cTel2']);

    

    try{
        $nResultado = $oFormularioC->insertar();
        
        if ($nResultado != 1){
            $sError = "Error en bd";
        }
    }catch(Exception $e){
        error_log($e->getFile()." ".$e->getLine()." ".$e->getMessage(),0);
        echo($e);
				$sErr = "Error en base de datos, comunicarse con el administrador";
    }

    if ($sErr == ""){
        header("Location: credito.php");
    }else{
        header("Location: error.php?sError=" . $sErr);
    }
		

?>