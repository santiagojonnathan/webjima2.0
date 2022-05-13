<?php
session_start();
include_once("modelo/operacionesBD.php");
    $sErr=""; $sOpe = ""; $sCve = "";

    $oFormularioC = new operacionesFormularioC();
    if (isset($_SESSION["usu"]) && !empty($_SESSION["usu"])){
        if (isset($_POST["txtClave"]) && !empty($_POST["txtClave"]) &&
        isset($_POST["txtOpe"]) && !empty($_POST["txtOpe"])){

    $sCve = $_POST["txtClave"];
   
    $sOpe = $_POST["txtOpe"];
	
    $oFormularioC->setnIdFormularioC($sCve);
    

    if ($sOpe != "b"){
    $oFormularioC->setcNombre($_POST['cNombre']);
    $oFormularioC->setcApePat($_POST['cApePat']);
    $oFormularioC->setcApeMat($_POST['cApeMat']);
    $oFormularioC->setcCurp($_POST['cCurp']);
    $oFormularioC->setcNoImss($_POST['cNoImss']);
    $oFormularioC->setcCodCre($_POST['cCodCre']);
    $oFormularioC->setcTel($_POST['cTel']);
    }
    
    try{
        if ($sOpe == 'm')
            $nResultado = $oFormularioC->modificar();
        else if ($sOpe == 'b'){
            $nResultado = $oFormularioC->borrar();
        }
            
         
           
        
        if ($nResultado != 1){
            $sError = "Error en bd";
        }
    }catch(Exception $e){
        //Enviar el error específico a la bitácora de php (dentro de php\logs\php_error_log
        error_log($e->getFile()." ".$e->getLine()." ".$e->getMessage(),0);
        $sErr = "Error en base de datos, comunicarse con el administrador";
    }
}else{
    $sErr = "Faltan datos";
		
}

}else{
    $sErr = "Falta establecer el login";
}
    

    if ($sErr == ""){
        header("Location: formularioCAdmon.php");
    }else{
        header("Location: errorA.php?sError=" . $sErr);
    }
    ?>