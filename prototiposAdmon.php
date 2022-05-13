<?php
session_start();
include_once("modelo/operacionesBD.php");
include_once("modelo/usuario.php"); 
	$oUsu = new usuario();
    $sErr = "";
    $arrVivienda = null;
    $oVivienda = new operacionesVivienda();
	if (isset($_SESSION["usu"]) && !empty($_SESSION["usu"])){
		$oUsu = $_SESSION["usu"];
    try {
        $arrVivienda = $oVivienda->buscarTodos();
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
			<h3>Viviendas</h3>
			<form name="formTablaGral" class="tablaP"method="post" action="abcPrototiposAdmon.php">
				<input type="hidden" name="txtClave">
				<input type="hidden" name="txtOpe">
				<table border="1">
					<tr>
						<td>Clave</td>
						<td>No. Habitación</td>
                        <td>No. Pisos</td>
                        <td>Medidas</td>
                        <td>Precio $MXN</td>
                        <td>Zona</td>
						<td>Prototipo</td>
						<td>Operaci&oacute;n</td>
					</tr>
					<?php
						if ($arrVivienda!=null){
							foreach($arrVivienda as $oVivienda){
					?>
					<tr>
						<td class="llave"><?php echo $oVivienda->getvidVivienda(); ?></td>
						<td><?php echo $oVivienda->getvNHabi(); ?></td>
                        <td><?php echo $oVivienda->getvNPisos(); ?></td>
                        <td><?php echo $oVivienda->getvMedidas(); ?></td>
                        <td><?php echo $oVivienda->getvPrecio(); ?></td>
                        <td><?php echo $oVivienda->getvIdZona(); ?></td>
						<td><?php echo $oVivienda->getvIdProt(); ?></td>
						
						<td>
						
						<input type="submit" name="Submit" value="Modificar" onClick="txtClave.value=<?php echo $oVivienda->getvidVivienda(); ?>; txtOpe.value='m'">
						<input type="submit" name="Submit" value="Borrar" onClick="txtClave.value=<?php echo $oVivienda->getvidVivienda(); ?>; txtOpe.value='b'">
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
					<tr>
					<input type="submit" name="Submit" value="Crear nuevo" onClick="txtClave.value='-1'; txtOpe.value='a'">
					</tr>
					
				</table>
				
			</form>
		</section>
    </main>

    <?php
    include_once("info.html");
    include_once("pie.html");

    ?>
