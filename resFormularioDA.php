<?php
session_start();
include_once("modelo/operacionesBD.php");
    $sErr=""; $sOpe = ""; $sCve = "";

    $oFormularioD = new operacionesFormularioD();

    if (isset($_SESSION["usu"]) && !empty($_SESSION["usu"])){

        if (isset($_POST["txtClave"]) && !empty($_POST["txtClave"]) &&
        isset($_POST["txtOpe"]) && !empty($_POST["txtOpe"])){

    $sCve = $_POST["txtClave"];
   
    $sOpe = $_POST["txtOpe"];
	
    $oFormularioD->setnIdFormularioD($sCve);
    

    if ($sOpe != "b"){
    $oFormularioD->setfNombre($_POST['fNombre']);
    $oFormularioD->setfApePat($_POST['fApePat']);
    $oFormularioD->setfApeMat($_POST['fApeMat']);
    $oFormularioD->setfEmail($_POST['fEmail']);
    $oFormularioD->setfComentario($_POST['fComentario']);
    $oFormularioD->setfTel($_POST['fTel']);
    $oFormularioD->setfIdProyecto($_POST['fIdProyecto']);
    }
    
    try{
        if ($sOpe == 'm')
            $nResultado = $oFormularioD->modificar();
        else if ($sOpe == 'b'){
            $nResultado = $oFormularioD->borrar();
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
}
else
    $sErr = "Falta establecer el login";


    

    if ($sErr == ""){
        header("Location: formularioDAdmon.php");
    }else{
        header("Location: errorA.php?sError=" . $sErr);
    }
    ?>