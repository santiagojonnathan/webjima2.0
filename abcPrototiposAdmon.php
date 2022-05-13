<?php
session_start();
include_once("modelo/operacionesBD.php");
$sErr=""; $sOpe = ""; $sCve = ""; $sNomBoton ="Borrar";
$oVivienda=new operacionesVivienda();
$bCampoEditable = false; $bLlaveEditable=false;
if (isset($_SESSION["usu"]) && !empty($_SESSION["usu"])){
if (isset($_POST["txtClave"]) && !empty($_POST["txtClave"]) &&
			isset($_POST["txtOpe"]) && !empty($_POST["txtOpe"])){
			$sOpe = $_POST["txtOpe"];
			$sCve = $_POST["txtClave"];
			
			if ($sOpe != 'a'){
				$oVivienda->setnIdVivienda($sCve);
				try{
					if (!$oVivienda->buscar()){
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
			<form name="abcFD" action="resPrototiposA.php" method="post">
				<input type="hidden" name="txtOpe" value="<?php echo $sOpe;?>">
				<input type="hidden" name="txtClave" value="<?php echo $sCve;?>"/>
				No. Habitación
				<input type="text" name="vNHabi" 
					<?php echo ($bCampoEditable==true?'':' disabled ');?>
					value="<?php echo $oVivienda->getvNHabi();?>"/>
				<br/>
				No. Pisos
				<input type="text" name="vNPisos" 
					<?php echo ($bCampoEditable==true?'':' disabled ');?>
					value="<?php echo $oVivienda->getvNPisos();?>"/>
				<br/>
				Medidas
				<input type="text" name="vMedidas" 
					<?php echo ($bCampoEditable==true?'':' disabled ');?>
					value="<?php echo $oVivienda->getvMedidas();?>"/>
				<br/>
				Precio
				<input type="text" name="vPrecio" 
					<?php echo ($bCampoEditable==true?'':' disabled ');?>
					value="<?php echo $oVivienda->getvPrecio();?>"/>
				<br/>
				Zona
				<select name="vIdZona" value="<?php echo $oVivienda->getvIdZona();?>">
                            <option>- Selecciona una area -</option>
                            <option value="1">VALLE ALEGRE</option>
                            <option value="2">GEO LOS PINOS</option>
                            <option value="3">CORDOBA 2000</option>
                        </select>
				<br/>
				Prototipo
				<select name="vIdProt" value="<?php echo $oVivienda->getvIdProt();?>">
                            <option>- Selecciona una area -</option>
                            <option value="1">CASA</option>
                            <option value="2">CONDOMINIO</option>
                            <option value="3">DEPARTAMENTO</option>
                        </select>
				<br/>

				<input type ="submit" value="<?php echo $sNomBoton;?>" 
				onClick="confirmaP();"/>
				<input type="submit" name="Submit" value="Cancelar" 
				 onClick="abcFD.action='prototiposAdmon.php';">
				 
				 
			</form>
		</section>

<?php

    include_once("pie.html")
?>