function init(){
	var otbinfo1 = document.getElementById("tbinfo1");
	var otbinfo2 = document.getElementById("tbinfo2");
	// poniendo los botones a la escucha.
	otbinfo1.addEventListener("click",tabshow,false);
	otbinfo2.addEventListener("click",tabshow,false);
	// poniendo visible el objeto tab del info 
	document.getElementById("finfo1").style.display = "block";
	document.getElementById("tbinfo1").setAttribute("class","active");
	// Menus interactivos
	// --------------------------------------------------------------------------------
	

	document.getElementById("cctano1").addEventListener("change",valid_cctano,false);
	document.getElementById("cctano2").addEventListener("change",valid_cctano,false);
	document.getElementById("cctano3").addEventListener("change",valid_cctano,false);
	document.getElementById("cctano4").addEventListener("change",valid_cctano,false);
	document.getElementById("cmonid").addEventListener("change",valid_cctano,false);
	document.getElementById("cperid").addEventListener("change",valid_cctano,false);

	// refrescando la pantalla con todo sus contenidos.
//	update_window();
}

function valid_cctano(pcvalue){
	var oRequest = new XMLHttpRequest();
	// Creando objeto para empaquetado de datos.
	var oDatos   = new FormData();
	// adicionando datos en formato CLAVE/VALOR en el objeto datos para enviar como parametro a la consulta AJAX
	oDatos.append("pcvalue",pcvalue);
	oDatos.append("pcuid",pcuid);
	oDatos.append("accion","CMICXNO");
	// obteniendo el menu
	oRequest.open("POST","../modelo/crud_cgctas.php",false); 
	oRequest.send(oDatos);
	// desplegando pantalla de menu con su informacion.
	var odata = JSON.parse(oRequest.response);
	//cargando los valores de la pantalla.
	if (odata != null){
		lcdescmicx = "cdescmic"+pcuid;
		document.getElementById(lcdescmicx).value = odata.cdesc;
	}else{ 
		alert("Agrupacion "+ pcuid + " no definida.");
	}
}
function salir(){
	//var pantalla = document.defaultView;
	document.getElementById("cgsetup").style.display="none";	
}
function guardar(){
	var oform = document.getElementById("cgsetup");
	oform.submit();
}
function update_window(){
	// --------------------------------------------------------------------------------------
	// Con esta funcion se hace una peticion al servidor para obtener un JSON, con los 
	// datos de la tabla master 
	// --------------------------------------------------------------------------------------
	var oRequest = new XMLHttpRequest();
	// Creando objeto para empaquetado de datos.
	var oDatos   = new FormData();
	oDatos.append("accion","JSON")
	oRequest.open("POST","../modelo/crud_cgsetup.php",false); 
	oRequest.send(oDatos);
	// desplegando pantalla de menu con su informacion.
	var odata = JSON.parse(oRequest.response);
	if (odata != null){
		//cargando los valores de la pantalla.
		document.getElementById("ntrnno1").value   = odata.ntrnno1;
		document.getElementById("ntrnno2").value   = odata.ntrnno2;
		document.getElementById("ntrnno3").value   = odata.ntrnno3;
		document.getElementById("ntrnno4").value   = odata.ntrnno4;
		document.getElementById("cperid").value    = odata.cperid;
		document.getElementById("cctano1").value   = odata.cctano1;
		document.getElementById("cctano2").value   = odata.cctano2;
		document.getElementById("cctano3").value   = odata.cctano3;
		document.getElementById("cctano4").value   = odata.cctano4;
		
		document.getElementById("cmonid").value    = odata.cmonid;
		document.getElementById("cfirma1").value   = odata.cfirma1;
		document.getElementById("cfirma2").value   = odata.cfirma2;
		document.getElementById("cfirma3").value   = odata.cfirma3;
		document.getElementById("ctitulo1").value  = odata.ctitulo1;
		document.getElementById("ctitulo2").value  = odata.ctitulo2;
		document.getElementById("ctitulo3").value  = odata.ctitulo3;

		document.getElementById("lviewf1").checked = (odata.lviewF1 == "1")? true:false;
		document.getElementById("lviewf2").checked = (odata.lviewF2 == "1")? true:false;
		document.getElementById("lviewf3").checked = (odata.lviewF3 == "1")? true:false;
		/*
		document.getElementById("llogoBC").checked = (odata.llogoBC == "1")? true:false;
		document.getElementById("llogobg").checked = (odata.llogoBG == "1")? true:false;
		document.getElementById("llogoer").checked = (odata.llogoER == "1")? true:false;
		*/
		document.getElementById("nrentax").value   = odata.nrentax;

		document.getElementById("cmic1desc").value = odata.cmic1desc;
		document.getElementById("cmic2desc").value = odata.cmic2desc;
		document.getElementById("cmic3desc").value = odata.cmic3desc;
		document.getElementById("cmic4desc").value = odata.cmic4desc;
		document.getElementById("cmic5desc").value = odata.cmic5desc;

		document.getElementById("lmic1desc").checked = (odata.lmic1desc == "1")? true:false;
		document.getElementById("lmic2desc").checked = (odata.lmic2desc == "1")? true:false;
		document.getElementById("lmic3desc").checked = (odata.lmic3desc == "1")? true:false;
		document.getElementById("lmic4desc").checked = (odata.lmic4desc == "1")? true:false;
		document.getElementById("lmic5desc").checked = (odata.lmic5desc == "1")? true:false;

		document.getElementById("nmic1desc").value = odata.nmic1desc;
		document.getElementById("nmic2desc").value = odata.nmic2desc;
		document.getElementById("nmic3desc").value = odata.nmic3desc;
		document.getElementById("nmic4desc").value = odata.nmic4desc;
		document.getElementById("nmic5desc").value = odata.nmic5desc;

		document.getElementById("lmic1desc1").checked = (odata.lmic1desc1 == "1")? true:false;
		document.getElementById("lmic2desc1").checked = (odata.lmic2desc1 == "1")? true:false;
		document.getElementById("lmic3desc1").checked = (odata.lmic3desc1 == "1")? true:false;
		document.getElementById("lmic4desc1").checked = (odata.lmic4desc1 == "1")? true:false;
		document.getElementById("lmic5desc1").checked = (odata.lmic5desc1 == "1")? true:false;

		document.getElementById("lmic1desc2").checked = (odata.lmic1desc2 == "1")? true:false;
		document.getElementById("lmic2desc2").checked = (odata.lmic2desc2 == "1")? true:false;
		document.getElementById("lmic3desc2").checked = (odata.lmic3desc2 == "1")? true:false;
		document.getElementById("lmic4desc2").checked = (odata.lmic4desc2 == "1")? true:false;
		document.getElementById("lmic5desc2").checked = (odata.lmic5desc2 == "1")? true:false;

		document.getElementById("lmic1desc3").checked = (odata.lmic1desc3 == "1")? true:false;
		document.getElementById("lmic2desc3").checked = (odata.lmic2desc3 == "1")? true:false;
		document.getElementById("lmic3desc3").checked = (odata.lmic3desc3 == "1")? true:false;
		document.getElementById("lmic4desc3").checked = (odata.lmic4desc3 == "1")? true:false;
		document.getElementById("lmic5desc3").checked = (odata.lmic5desc3 == "1")? true:false;

		document.getElementById("lmic1desc4").checked = (odata.lmic1desc4 == "1")? true:false;
		document.getElementById("lmic2desc4").checked = (odata.lmic2desc4 == "1")? true:false;
		document.getElementById("lmic3desc4").checked = (odata.lmic3desc4 == "1")? true:false;
		document.getElementById("lmic4desc4").checked = (odata.lmic4desc4 == "1")? true:false;
		document.getElementById("lmic5desc4").checked = (odata.lmic5desc4 == "1")? true:false;

		document.getElementById("ncashamt").value = odata.ncashamt;
		document.getElementById("ngrupid").value = odata.ngrupid;
		document.getElementById("lnConfRChk").value = odata.lnConfRChk ;
lnConfRChk
	}else{
		alert("Modulo no configurado");
	}
}
function tabshow(e){
	// evitando que el tipo de boton haga un submit por defecto y recargue la pagina.
	e.preventDefault();
	var oTabFormBoton = e.target.id;
	
	// poniendo ocultos todos los div pantallas ocultos
	var oTabForm = document.getElementsByClassName("tabcontent");
	for (i = 0; i < oTabForm.length; i++) {
		oTabForm[i].style.display = "none";
	}

	if(oTabFormBoton == "tbinfo1"){
		document.getElementById("finfo1").style.display = "block";
		document.getElementById("tbinfo2").setAttribute("class","")
	}
	
	if(oTabFormBoton == "tbinfo2"){
		document.getElementById("finfo2").style.display = "block";
		document.getElementById("tbinfo1").setAttribute("class","")
	}
	document.getElementById(oTabFormBoton).setAttribute("class","active");

}
window.onload=init;