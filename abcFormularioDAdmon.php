<?php
session_start();
include_once("modelo/operacionesBD.php");
$sErr=""; $sOpe = ""; $sCve = ""; $sNomBoton ="Borrar";
$oFormularioD=new operacionesFormularioD();
$bCampoEditable = false; $bLlaveEditable=false;
if (isset($_SESSION["usu"]) && !empty($_SESSION["usu"])){
if (isset($_POST["txtClave"]) && !empty($_POST["txtClave"]) &&
			isset($_POST["txtOpe"]) && !empty($_POST["txtOpe"])){
			$sOpe = $_POST["txtOpe"];
			$sCve = $_POST["txtClave"];
			if ($sOpe != 'a'){
				$oFormularioD->setnIdFormularioD($sCve);
				try{
					if (!$oFormularioD->buscar()){
						$sError = "Formulario no existe";
					}
				}catch(Exception $e){
					error_log($e->getFile()." ".$e->getLine()." ".$e->getMessage(),0);
					$sErr = "Error en base de datos, comunicarse con el administrador";
				}
			}
			if ($sOpe == 'a'){
				$bCampoEditable = true;
				$bLlaveEditable = true;
				$sNomBoton ="Agregar";
			}
			else if ($sOpe == 'm'){
				$bCampoEditable = true; //la llave no es editable por omisión
				$sNomBoton ="Modificar";
			}
			//Si fue borrado, nada es editable y es el valor por omisión
		}
		else{
			$sErr = "Faltan datos";
		}

	}
	else
		$sErr = "Falta establecer el login";

        if ($sErr == ""){
            include_once("cabeceraAd.html");
            include_once("banner.html");
        }else{
            header("Location: errorA.php?sError=".$sErr);
            exit();
        }

?>
<section style="text-align:center">
			<form name="abcFD" action="resFormularioDA.php" method="post">
				<input type="hidden" name="txtOpe" value="<?php echo $sOpe;?>">
				<input type="hidden" name="txtClave" value="<?php echo $sCve;?>"/>
				Nombre
				<input type="text" name="fNombre" 
					<?php echo ($bCampoEditable==true?'':' disabled ');?>
					value="<?php echo $oFormularioD->getfNombre();?>"/>
				<br/>
				Apellido Paterno
				<input type="text" name="fApePat" 
					<?php echo ($bCampoEditable==true?'':' disabled ');?>
					value="<?php echo $oFormularioD->getfApePat();?>"/>
				<br/>
				Apellido Materno
				<input type="text" name="fApeMat" 
					<?php echo ($bCampoEditable==true?'':' disabled ');?>
					value="<?php echo $oFormularioD->getfApeMat();?>"/>
				<br/>
				Email
				<input type="text" name="fEmail" 
					<?php echo ($bCampoEditable==true?'':' disabled ');?>
					value="<?php echo $oFormularioD->getfEmail();?>"/>
				<br/>
				Telefono
				<input type="text" name="fTel" maxlength="11"
					<?php echo ($bCampoEditable==true?'':' disabled ');?>
					value="<?php echo $oFormularioD->getfTel();?>"/>
				<br/>
				Tipo Prototipo
				<select name="fIdProyecto" value="<?php echo $oFormularioD->getfIdProyecto();?>">
                            <option>- Selecciona una area -</option>
                            <option value="1">DEPARTAMENTO</option>
                            <option value="2">RESIDENCIA</option>
                            <option value="3">OTRO</option>
                        </select>
				<br/>
				Comentario
				<input type="text" name="fComentario" 
					<?php echo ($bCampoEditable==true?'':' disabled ');?>
					value="<?php echo $oFormularioD->getfComentario();?>"/>
				<br/>

				<input type ="submit" value="<?php echo $sNomBoton;?>" 
				onClick="confirmaD();"/>
				<input type="submit" name="Submit" value="Cancelar" 
				 onClick="abcFD.action='formularioDAdmon.php';">
				 
				 
			</form>
		</section>

<?php
    include_once("pie.html")
?>