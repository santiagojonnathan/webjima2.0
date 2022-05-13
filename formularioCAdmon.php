<?php
session_start();
include_once("modelo/operacionesBD.php");
include_once("modelo/usuario.php");
    $sErr = "";
	$oUsu = new usuario();
    $arrFormularioC = null;
    $oFormularioC = new operacionesFormularioC();
	if (isset($_SESSION["usu"]) && !empty($_SESSION["usu"])){
		$oUsu = $_SESSION["usu"];
    try {
        $arrFormularioC = $oFormularioC->buscarTodos();
    } catch (Exception $e) {
        error_log($e->getFile() . "," . $e->getLine() . "," . $e->getMessage(), 0);
        $sErr = "Error en base de datos, comunicarse con el administrador";
    }
	}
else
	$sErr = "Falta establecer el login";

	if ($sErr == ""){
		include_once("cabeceraAd.html");
    	include_once("banner.html");
	}
	else{
		header("Location: errorA.php?sError=".$sErr);
		exit();
	}
    ?>
    <main>
    <section>
			<h3>Formulario Dudas</h3>
			<form name="formTablaGral" class="formularioCA" method="post" action="abcFormularioCAdmon.php">
				<input type="hidden" name="txtClave">
				<input type="hidden" name="txtOpe">
				<table border="1">
					<tr>
						<td>Clave</td>
						<td>Nombre</td>
                        <td>CURP</td>
                        <td>No. IMSS</td>
                        <td>Codigo Credito</td>
                        <td>Telefono</td>
						<td>Operaci&oacute;n</td>
					</tr>
					<?php
						if ($arrFormularioC!=null){
							foreach($arrFormularioC as $oFormularioC){
					?>
					<tr>
						<td class="llave"><?php echo $oFormularioC->getcidCredito(); ?></td>
						<td><?php echo $oFormularioC->getcNombre(); ?></td>
                        <td><?php echo $oFormularioC->getcCurp(); ?></td>
                        <td><?php echo $oFormularioC->getcNoImss(); ?></td>
                        <td><?php echo $oFormularioC->getcCodCre(); ?></td>
                        <td><?php echo $oFormularioC->getcTel(); ?></td>

						<td>
						<input type="submit" name="Submit" value="Modificar" onClick="txtClave.value=<?php echo $oFormularioC->getcidCredito(); ?>; txtOpe.value='m'">
						<input type="submit" name="Submit" value="Borrar" onClick="txtClave.value=<?php echo $oFormularioC->getcidCredito(); ?>; txtOpe.value='b'">
						</td>
					</tr>
					<?php 
							}//foreach
						}else{
					?>     
					<tr>
						<td colspan="2">No hay datos</td>
					</tr>
					<?php
						}
					?>
				</table>
				
			</form>
		</section>
    </main>

    <?php
    include_once("info.html");
    include_once("pie.html");

    ?>
