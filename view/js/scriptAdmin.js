var comprobarV=0;
var comprobarU=0;
var comprobarR=0;

var midato= new Object();
var tipos = [];
var m;// variable utilizada en frontal para sacar los tipos
$(document).ready(function(){
// alert("ready");
	iniciarVAdmin();
	$(".tituloVAdmin").click(function(){
		if(comprobarV==0){
			$(".rellenoAdminVehiculo").show(1200); 
			comprobarV=1;
		}else{
			$(".rellenoAdminVehiculo").hide(800);
			comprobarV=0;
		}
		
	});
	
	iniciarUAdmin();
	
	$(".tituloUAdmin").click(function(){
		if(comprobarU==0){
			$(".rellenoAdminUsuario").show(1200);
		comprobarU=1;
		}else{
			$(".rellenoAdminUsuario").hide(800);
			comprobarU=0;
		}
	});
	
	iniciarRAdmin();
	
	$(".tituloRAdmin").click(function(){
		if(comprobarR==0){
			$(".rellenoAdminReserva").show(1200);
		comprobarR=1;
		}else{
			$(".rellenoAdminReserva").hide(800);
			comprobarR=0;
		}
	});
	/*
	 * $(".deleteV").click(function(){ alert("boton_delete_vehiculo");
	 * 
	 * var num=parseInt($("#numeroent").val());
	 * if(num>midato[minum].butacasLibres){ alert("No hay suficientes
	 * entradas"); }else{
	 * midato[minum].butacasLibres=midato[minum].butacasLibres-parseInt($("#numeroent").val());
	 * sala=minum+1;
	 *  // var cadena=JSON.stringify(json); // localsala['antzokia']=cadena;
	 * 
	 * htmlCode="SALA NUMERO "+sala+"<br>NUMERO DE BUTACAS TOTALES:
	 * "+midato[minum].butacasTotal +"<br>NUMERO DE BUTACAS DISPONIBLES:
	 * "+midato[minum].butacasLibres; alert("hola");
	 * $("#salacompra").html(htmlCode);
	 * 
	 * miId=midato[minum].id; miButacasLibres=midato[minum].butacasLibres;
	 * 
	 * enviarDato={'id': miId,'butacasLibres': miButacasLibres};
	 * 
	 * enviarDato=JSON.stringify(enviarDato); $.ajax({ type:"POST",
	 * data:{'enviarDato':enviarDato},
	 * url:"controller/controlador_modificar_butacasLibres.php", success:
	 * function(datos){ alert("Se han comprado las entradas con éxito."); },
	 * error: function(xhr){ alert("An error occured: "+xhr.status+"
	 * "+xhr.statusText); } });
	 * 
	 * 
	 * $('#numeroent').val(""); $('#precio').val($('#tipo').val());
	 * $('#total').val(0);
	 * 
	 *  } });
	 */
});


function iniciarVAdmin(){
	$.ajax({
        type:"JSON",
        url:"../controller/cMostrarVehiculos.php",
        success: function(datosV){
/*
 * alert(datos); alert("success");
 */            midatoV=JSON.parse(datosV);
$.each(midatoV,function(i,datoV){
	

            $(".rellenoAdminVehiculo").append(`<tr>
            		<td>`+datoV.idVehiculo+`</td>            		
            		<td>`+datoV.nombre+`</td>
            		<td>`+datoV.modelo+`</td>
            		<td>`+datoV.potencia+`</td>
            		<td><img src="`+datoV.img+`" style="width:100px; height:auto;"></td>
            		<td>`+datoV.tipo+`</td>
            		<td><button class="deleteV delete_paneles">DELETE</button></td>
            		<td><button class="updateV update_paneles">UPDATE</button></td>
        		</tr>`);
});
        },
        error: function(xhr){
            alert("An error occured: "+xhr.status+" "+xhr.statusText);
        }
    });
	}

function iniciarUAdmin(){
	$.ajax({
        type:"JSON",
        url:"../controller/cMostrarUsers.php",
        success: function(datosU){

/*
 * alert(datos); alert("success");
 */            midatoU=JSON.parse(datosU);


$.each(midatoU,function(i,datoU){


            $(".rellenoAdminUsuario").append(`<tr>
            		<td>`+datoU.idUsuario+`</td>            		
            		<td>`+datoU.usuario+`</td>
            		<td>`+datoU.contrasena+`</td>
            		<td>`+datoU.nombre+`</td>
            		<td>`+datoU.apellido+`</td>
            		<td>`+datoU.telefono+`</td>
            		<td>`+datoU.dni+`</td>
            		<td>`+datoU.tipo+`</td>
            		<td><button class="deleteU delete_paneles">DELETE</button></td>
            		<td><button class="updateU update_paneles">UPDATE</button></td>
        		</tr>`);
});
        },
        error: function(xhr){
            alert("An error occured: "+xhr.status+" "+xhr.statusText);
        }
    });
	}

function iniciarRAdmin(){
	$.ajax({
        type:"JSON",
        url:"../controller/cMostrarReservas.php",
        success: function(datosR){

/*
 * alert(datos); alert("success");
 */            midatoR=JSON.parse(datosR);


$.each(midatoR,function(i,datoR){


            $(".rellenoAdminUsuario").append(`<tr>
            		<td>`+datoR.idReserva+`</td>            		
            		<td>`+datoR.fechaReserva+`</td>
            		<td>`+datoR.fechaReservada+`</td>
            		<td>`+datoR.horaInicio+`</td>
            		<td>`+datoR.horaFin+`</td>
            		<td>`+datoR.idUsuario+`</td>
            		<td>`+datoR.idVehiculo+`</td>
            		<td><button class="deleteU delete_paneles">DELETE</button></td>
            		<td><button class="updateU update_paneles">UPDATE</button></td>
        		</tr>`);
});
        },
        error: function(xhr){
            alert("An error occured: "+xhr.status+" "+xhr.statusText);
        }
    });
	}