<?php
session_start();
include_once("modelo/operacionesBD.php");
$sErr = "";
$sCve = "";
$sPwd = "";
$oUsu = new usuario();
if (
    isset($_POST["txtCve"]) && !empty($_POST["txtCve"]) &&
    isset($_POST["txtPwd"]) && !empty($_POST["txtPwd"])
) {    
        $sCve = $_POST["txtCve"];
		$sPwd = $_POST["txtPwd"];
		$oUsu->setClave($sCve);
		$oUsu->setPwd($sPwd);
        try{
            if($oUsu->buscarCvePwd()){
                $_SESSION["usu"] = $oUsu;
                if($oUsu->getPers()->getTipo()==operacionesUsuario::TIPO_ADMON)
                $_SESSION["tipo"] = "administrador";
            }else{
                $sErr = "Usuario desconocido";
            }
        }catch(Exception $e){
            error_log($e->getFile()." ".$e->getLine()." ".$e->getMessage(),0);
			$sErr = "Error al acceder a la base de datos";
        }
}
else{
    $sErr = "Faltan Datos";
}
   
if($sErr == ""){
    header("Location: formularioDAdmon.php");
    
}else{
    header("Location: error.php?sError=".$sErr);
}
?>