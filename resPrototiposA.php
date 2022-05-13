<?php
session_start();
include_once("modelo/operacionesBD.php");

    $sErr=""; $sOpe = ""; $sCve = "";

    $oVivienda = new operacionesVivienda();

    if (isset($_SESSION["usu"]) && !empty($_SESSION["usu"])){

        if (isset($_POST["txtClave"]) && !empty($_POST["txtClave"]) &&
        isset($_POST["txtOpe"]) && !empty($_POST["txtOpe"])){

    $sCve = $_POST["txtClave"];
   
    $sOpe = $_POST["txtOpe"];
	
    $oVivienda->setnIdVivienda($sCve);
    
    

    if ($sOpe != "b"){
    $oVivienda->setvNHabi($_POST['vNHabi']);
    $oVivienda->setvNPisos($_POST['vNPisos']);
    $oVivienda->setvMedidas($_POST['vMedidas']);
    $oVivienda->setvPrecio($_POST['vPrecio']);
    $oVivienda->setvIdZona($_POST['vIdZona']);
    $oVivienda->setvIdProt($_POST['vIdProt']);
    }
    
    try{
        if ($sOpe == 'a')
            $nResultado = $oVivienda->insertar();
        else if ($sOpe == 'b'){
            $nResultado = $oVivienda->borrar();
        }else
            $nResultado = $oVivienda->modificar();
            
         
           
        
        if ($nResultado != 1){
            $sError = "Error en bd";
        }
    }catch(Exception $e){
        //Enviar el error específico a la bitácora de php (dentro de php\logs\php_error_log
        error_log($e->getFile()."".$e->getLine()."".$e->getMessage(),0);
        $sErr = "Error en base de datos, comunicarse con el administrador";
    }
}
else{
    $sErr = "Faltan datos";
}
}
else
$sErr = "Falta establecer el login";


    

    if ($sErr == ""){
        header("Location: prototiposAdmon.php");
    }else{
        header("Location: errorA.php?sError=" . $sErr);
    }
?>