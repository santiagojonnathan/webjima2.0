<?php
session_start();
include_once("modelo/operacionesBD.php");
include_once("modelo/usuario.php");
    $sErr = "";
	$oUsu = new usuario();
    $arrFormularioD = null;
    $oFormularioD = new operacionesFormularioD();
	if (isset($_SESSION["usu"]) && !empty($_SESSION["usu"])){
		$oUsu = $_SESSION["usu"];
		try {
        $arrFormularioD = $oFormularioD->buscarTodos();
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
			<form name="formTablaGral" class="formularioDA" method="post" action="abcFormularioDAdmon.php">
				<input type="hidden" name="txtClave">
				<input type="hidden" name="txtOpe">
				<table border="1">
					<tr>
						<td>Clave</td>
						<td>Nombre</td>
                        <td>Email</td>
                        <td>Telefono</td>
                        <td>Comentario</td>
                        <td>Proyecto</td>
						<td>Operaci&oacute;n</td>
					</tr>
					<?php
						if ($arrFormularioD!=null){
							foreach($arrFormularioD as $oFormularioD){
					?>
					<tr>
						<td class="llave"><?php echo $oFormularioD->getfIdFormulario(); ?></td>
						<td><?php echo $oFormularioD->getfNombre(); ?></td>
                        <td><?php echo $oFormularioD->getfEmail(); ?></td>
                        <td><?php echo $oFormularioD->getfTel(); ?></td>
                        <td><?php echo $oFormularioD->getfComentario(); ?></td>
                        <td><?php echo $oFormularioD->getfIdProyecto(); ?></td>

						<td>
						<input type="submit" name="Submit" value="Modificar" onClick="txtClave.value=<?php echo $oFormularioD->getfIdFormulario(); ?>; txtOpe.value='m'">
						<input type="submit" name="Submit" value="Borrar" onClick="txtClave.value=<?php echo $oFormularioD->getfIdFormulario(); ?>; txtOpe.value='b'">
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
