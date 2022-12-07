var oCg = {};

function init(){
    document.getElementById("cctaid1").addEventListener("change",upddet,false);
	document.getElementById("btnguardar").addEventListener("click",guardar,false);
}
function deleteRow(row){
    var d = row.parentNode.parentNode.rowIndex;
    document.getElementById('tdetalles').deleteRow(d);
    cksum();
}
function cksum(){
	var otabla = document.getElementById("tdetalles");
	var lndiferencia = 0, lndebe = 0,lnhaber = 0;
	var lnveces = otabla.rows.length;
	for (var i = 0; i < lnveces; ++i){
		// debe
		if (otabla.rows[i].cells[2].children[0].value == ""){
			lndebe += 0.00;
		}else{
			lndebe += parseFloat(otabla.rows[i].cells[2].children[0].value);
		}

		//haber
		if (otabla.rows[i].cells[3].children[0].value == ""){
			lnhaber += 0.00;
		}else{
			lnhaber += parseFloat(otabla.rows[i].cells[3].children[0].value);
		}
	}
	// cargando los valores del total.
	lndiferencia = (lndebe - lnhaber).toFixed(2);
	document.getElementById("tdiferencia").value = lndiferencia;
	document.getElementById("tdebe").value  = lndebe.toFixed(2);
	document.getElementById("thaber").value = lnhaber.toFixed(2);
}
function set_validation_table(){
	var oinput1 = document.querySelectorAll("#ndebe");
	var oinput2 = document.querySelectorAll("#nhaber");
	for (var i=0; i<oinput1.length; i++){
		// poniendo a la escucha del evento ONCHANGE cada objeto
		oinput1[i].onchange = cksum;
		oinput2[i].onchange = cksum;
	}
}
function upddet(){
	otabla = document.getElementById("tdetalles");
    lcoption = document.getElementById("cctaid1");
    lnindex  = lcoption.selectedIndex;
    lcdesc   = lcoption.children[lnindex].innerHTML;
    lcxvalue = lcoption.value;
    if (!lcdesc){
        return ;
    }
	lcecho = "<tr> ";
	lcecho += ' <td scope="col" ><input type="text" class="saykey"  readonly name="tid[]"    value="'+ lcxvalue + '"></td>';
	lcecho += '	<td scope="col" ><input type="text" class="saytext" readonly name="tcdesc[]" value="'+ lcdesc + '"></th>';
	lcecho +='	<td scope="col" ><input type="number" id="ndebe" name="tndebe[]"></td>';
	lcecho += '	<td scope="col" ><input type="number" id="nhaber" name="tnhaber[]"></td>';
	lcecho += '	<td>';
	lcecho += '		<a class="btlinks_warning"  onclick="deleteRow(this)" title="Eliminar Registro" >Editar</a>';
	lcecho += '	</td>';
	lcecho += '</tr>';
	
	otabla.insertRow(-1).innerHTML = lcecho;
	document.getElementById("cctaid1").value = "";
	// ---------------------------------------------------------------------------------------------------------
	// c)- configurando detalle para que responda a eventos.
	// ---------------------------------------------------------------------------------------------------------
	set_validation_table();
	cksum();
}

function showformaddline(){
	document.getElementById("form_detelle").style.display="inline-block";
}
function isvalidentry(){
	if (document.getElementById("crespno").value == ""){
		alert("Indique un responsable");
		return false;
	}
	if (document.getElementById("dtrndate").value == ""){
		alert("Indique la fecha");
		return false;
	}
	if (document.getElementById("ctype").value == ""){
		alert("Indique el tipo de documento");
		return false;
	}
	if (document.getElementById("cperid").value == ""){
		alert("Indique el periodo contable");
		return false;
	}
	return true;
}
function guardar(){
	if (!isvalidentry()){
		return ;
	}
	// b)- Validando que hayan detalles a procesar.
	var otabla = document.getElementById("tdetalles");
	var lnrows = otabla.rows.length ;
	if(lnrows == 0){
		alert("No hay detalle del comprobante.");
		return ;
	}
	document.getElementById("cgmast_1").submit();

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
	oRequest.open("POST","../modelo/crud_cgmast_1.php",false); 
	oRequest.send(oDatos);
	// desplegando pantalla de menu con su informacion.
	var odata = JSON.parse(oRequest.response);
	if (odata != null){
		document.getElementById("crespno").value  = odata.crespno;
		document.getElementById("dtrndate").value = odata.dtrndate;
		document.getElementById("cperid").value   = odata.cperid;
		document.getElementById("cdesc").value    = odata.cdesc;
		document.getElementById("ctype").value    = odata.ctype;
		document.getElementById("nrate").value    = odata.nrate;
		// cargando el detalle.
		for (let index = 0; index < odata.length; index++) {
				cctaid = odata[3][index];		
				
				lcline = "<tr>";
				lcline =+ "<td></td>";
				lcline =+ "<td></td>";
				lcline =+ "</tr>"; 
			}		
		}else{
			alert("Modulo no configurado");
		}
}
window.onload=init;