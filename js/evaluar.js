function evaluaD(fNombre, fApePat, fEmail, fTel, fIdProyecto) {
	var sErr = "";
	var bRet = false;

	if (fNombre.value == "")
		sErr = sErr + "\n Falta Nombre";

	if (fApePat.value == "")
		sErr = sErr + "\n Falta Apellido Paterno";

	if (fEmail.value == "")
	sErr = sErr + "\n Falta Email";

	if (fTel.value == "")
	sErr = sErr + "\n Falta Telefono";

	if (fIdProyecto.value == "")
	sErr = sErr + "\n Falta Seleccionar proyecto";
	
	if (sErr == "")
		bRet = true;
	else
		alert(sErr);

	return bRet;
}

function evaluaC(cNombre, cApePat, cCurp, cNoImss, cTel) {
	var sErr = "";
	var bRet = false;

	if (cNombre.value == "")
		sErr = sErr + "\n Falta Nombre";

	if (cApePat.value == "")
		sErr = sErr + "\n Falta Apellido Paterno";

	if (cCurp.value == "")
	sErr = sErr + "\n Falta CURP";

	if (cNoImss.value == "")
	sErr = sErr + "\n Falta No. Imss";

	if (cTel.value == "")
	sErr = sErr + "\n Falta Seleccionar proyecto";
	
	if (sErr == "")
		bRet = true;
	else
		alert(sErr);

	return bRet;
}

function confirmaD() {
	let text = "¿Seguro que quiere realizar los cambios?";
	if(confirm(text) == true){
		alert("Se realiazo el cambio")
	}else{
		alert("Se cancelo el cambio")
		abcFD.action='formularioDAdmon.php';
	}	
}

function confirmaC() {
	let text = "¿Seguro que quiere realizar los cambios?";
	if(confirm(text) == true){
		alert("Se realiazo el cambio")
	}else{
		alert("Se cancelo el cambio")
		abcFD.action='formularioCAdmon.php';
	}	
}

function confirmaP() {
	let text = "¿Seguro que quiere realizar los cambios?";
	if(confirm(text) == true){
		alert("Se realiazo el cambio")
	}else{
		alert("Se cancelo el cambio")
		abcFD.action='prototiposAdmon.php';
	}	
}