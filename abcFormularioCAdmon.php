<?php
session_start();
include_once("modelo/operacionesBD.php");
$sErr = "";
$sOpe = "";
$sCve = "";
$sNomBoton = "Borrar";
$oFormularioC = new operacionesFormularioC();
$bCampoEditable = false;
$bLlaveEditable = false;
if (isset($_SESSION["usu"]) && !empty($_SESSION["usu"])) {
	if (
		isset($_POST["txtClave"]) && !empty($_POST["txtClave"]) &&
		isset($_POST["txtOpe"]) && !empty($_POST["txtOpe"])
	) {
		$sOpe = $_POST["txtOpe"];
		$sCve = $_POST["txtClave"];
		if ($sOpe != 'a') {
			$oFormularioC->setnIdFormularioC($sCve);
			try {
				if (!$oFormularioC->buscar()) {
					$sError = "Formulario no existe";
				}
			} catch (Exception $e) {
				error_log($e->getFile() . " " . $e->getLine() . " " . $e->getMessage(), 0);
				$sErr = "Error en base de datos, comunicarse con el administrador";
			}
		}
		if ($sOpe == 'a') {
			$bCampoEditable = true;
			$bLlaveEditable = true;
			$sNomBoton = "Agregar";
		} else if ($sOpe == 'm') {
			$bCampoEditable = true; //la llave no es editable por omisión
			$sNomBoton = "Modificar";
		}
		//Si fue borrado, nada es editable y es el valor por omisión
	} else {
		$sErr = "Faltan datos";
	}
} else
	$sErr = "Falta establecer el login";

if ($sErr == "") {
	include_once("cabeceraAd.html");
	include_once("banner.html");
} else {
	header("Location: errorA.php?sError=" . $sErr);
	exit();
}

?>
<section style="text-align:center">
	<form name="abcFD" action="resFormularioCA.php" method="post">
		<input type="hidden" name="txtOpe" value="<?php echo $sOpe; ?>">
		<input type="hidden" name="txtClave" value="<?php echo $sCve; ?>" />
		Nombre
		<input type="text" name="cNombre" <?php echo ($bCampoEditable == true ? '' : ' disabled '); ?> value="<?php echo $oFormularioC->getcNombre(); ?>" />
		<br />
		Apellido Paterno
		<input type="text" name="cApePat" <?php echo ($bCampoEditable == true ? '' : ' disabled '); ?> value="<?php echo $oFormularioC->getcApePat(); ?>" />
		<br />
		Apellido Materno
		<input type="text" name="cApeMat" <?php echo ($bCampoEditable == true ? '' : ' disabled '); ?> value="<?php echo $oFormularioC->getcApeMat(); ?>" />
		<br />
		CURP
		<input type="text" name="cCurp" <?php echo ($bCampoEditable == true ? '' : ' disabled '); ?> value="<?php echo $oFormularioC->getcCurp(); ?>" />
		<br />
		No. IMSS
		<input type="text" name="cNoImss" <?php echo ($bCampoEditable == true ? '' : ' disabled '); ?> value="<?php echo $oFormularioC->getcNoImss(); ?>" />
		<br />
		Tipo Credito
		<select name="cCodCre" value="<?php echo $oFormularioC->getcCodCre(); ?>">
			<option>- Seleccione el tipo de credito -</option>
			<option value="1">FOVISSSTE</option>
			<option value="2">COFINAVIT</option>
			<option value="3">BANCA HIPOTECARIA</option>
			<option value="4">OTRO</option>
		</select>
		<br />
		Telefono
		<input type="text" name="cTel" maxlength="11" <?php echo ($bCampoEditable == true ? '' : ' disabled '); ?> value="<?php echo $oFormularioC->getcTel(); ?>" />
		<br />

		<input type="submit" value="<?php echo $sNomBoton; ?>" onClick="confirmaC();" />
		<input type="submit" name="Submit" value="Cancelar" onClick="abcFD.action='formularioCAdmon.php';">


	</form>
</section>

<?php
include_once("pie.html")
?>