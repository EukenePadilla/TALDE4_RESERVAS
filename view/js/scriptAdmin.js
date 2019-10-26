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
			$(".rellenoAdminUsuario").hide(800);
			$(".rellenoAdminReserva").hide(800);
			comprobarV=1;
		}else{
			$(".rellenoAdminVehiculo").hide(800);
			comprobarV=0;
		}
	});
	
	$(".insertV").click(function(){
		
		$(".paneles").hide(800);
		$(".encabezado_vAdmin").hide(800);
		$("body").css("background-color", "	#abcdef");

	    
		$(".insertarAdmin").append(`<form id="form_vAdminInsertV" >
		    <div id="elementos_vAdminInsertV">
		        <div class="nombre_vAdminInsertV">
		        <label>Nombre:</label>
		        <input id="nombre" type="text">
		        </div>
		
		        <div class="modelo_vAdminInsertV">
		        <label>Modelo:</label>
		        <input id="modelo" type="text">
		        </div>
		
		        <div class="potencia_vAdminInsertV">
		        <label>Potencia:</label>
		        <input id="potencia" type="text">     
		        </div>
		
		        <div class="img_vAdminInsertV">
		        <label>Img:</label>
		        <input id="img" type="text"> 
		        </div>
		
		        <div class="tipo_vAdminInsertV">
		        <label>Tipo:</label>
		        <input id="tipo" type="text">
		        </div>
		        <input type="button" id="submit_vAdminInsertV" value="GO!" onclick="onclick_vAdminVehiculo()">
				
		    </div>
		    <button class="boton_atras_vAdminV goBack">GO BACK</button>
		    </form>`);
		
		
		
		//boton para esconder el insert de vAdmin correspondiente y mostrar las tablas
		$(".goBack").click(function(){
			$(".insertarAdmin").hide(800);

			$(".paneles").show(1200);
			
		});    
	});
	
	
	iniciarUAdmin();
	
	$(".tituloUAdmin").click(function(){
		if(comprobarU==0){
			$(".rellenoAdminUsuario").show(1200);
			$(".rellenoAdminVehiculo").hide(800);
			$(".rellenoAdminReserva").hide(800);

		comprobarU=1;
		}else{
			$(".rellenoAdminUsuario").hide(800);
			comprobarU=0;
		}
	});
$(".insertU").click(function(){
		
		$(".paneles").hide(800);
		$(".encabezado_vAdmin").hide(800);
		$("body").css("background-color", "	#abcdef");

	    
		$(".insertarAdmin").append(`<form id="form_vAdminInsertU" >
		    <div id="elementos_vAdminInsertU">
		    
		        <div class="usuario_vAdminInsertU">
		        <label>Usuario:</label>
		        <input id="usuario" type="text">
		        </div>
		        
		        <div class="contrasena_vAdminInsertU">
		        <label>Contrasena:</label>
		        <input id="contrasena" type="text">
		        </div>	
		        	        
		        <div class="nombre_vAdminInsertU">
		        <label>Nombre:</label>
		        <input id="nombre" type="text">
		        </div>	
		        
		        <div class="apellido_vAdminInsertU">
		        <label>Apellido:</label>
		        <input id="apellido" type="text">
		        </div>
		        
		        <div class="telefono_vAdminInsertU">
		        <label>Telefono:</label>
		        <input id="telefono" type="text">
		        </div>
		        
		        <div class="dni_vAdminInsertU">
		        <label>DNI:</label>
		        <input id="dni" type="text">
		        </div>
		        
		        <div class="tipo_vAdminInsertU">
		        <label>Tipo:</label>
		        <input id="tipo" type="text">
		        </div>
		        
		        <input type="button" id="submit_vAdminInsertU" value="GO!" onclick="onclick_vAdminUsuario()">
				
		    </div>
		    <button class="boton_atras_vAdminU goBack">GO BACK</button>
		    </form>`);
		
		
		
		//boton para esconder el insert de vAdmin correspondiente y mostrar las tablas
		$(".goBack").click(function(){
			$(".insertarAdmin").hide(800);

			$(".paneles").show(1200);
			
		});    
	});
	
/*	iniciarRAdmin();
*/	
	$(".tituloRAdmin").click(function(){
		if(comprobarR==0){
			$(".rellenoAdminReserva").show(1200);			
			$(".rellenoAdminUsuario").hide(800);
			$(".rellenoAdminVehiculo").hide(800);

		comprobarR=1;
		}else{
			$(".rellenoAdminReserva").hide(800);
			
			comprobarR=0;
		}
	});
	
	  
});



/*INICIO DE INICIAR LAS TABLAS EN LA VISTA ADMIN
 * 
 * 
*/

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
            		<td><button class="deleteV delete_paneles" value="`+datoV.idVehiculo+`">DELETE</button></td>
            		<td><button class="updateV update_paneles">UPDATE</button></td>
        		</tr>`);
 		});

 		
 		$(".deleteV").click(function(){
 			
 			var id=$(this).val(); 
 			alert(id);
 			console.log(id);
 			
 		  	$.ajax({
 		       	type: "GET",
 		       	data:{'id':id},
 		       	url: "../controller/cDeleteVehiculo.php", 

 		       	success: function(result){  
 		       		
 		       		console.log(result);
 		       		alert(result);
 		       		location.reload(true);  //recarga la pagina
 		       	},
 		       	error : function(xhr) {
 		   			alert("An error occured: " + xhr.status + " " + xhr.statusText);
 		   		}
 		       });
 		  	
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
		            		<td><button class="deleteU delete_paneles" value="`+datoU.idUsuario+`">DELETE</button></td>
		            		<td><button class="updateU update_paneles">UPDATE</button></td>
		        		</tr>`);
		        	$(".deleteU").click(function(){
		     			
		     			var id=$(this).val(); 
		     			alert(id);
		     			console.log(id);
		     			
		     		  	$.ajax({
		     		       	type: "GET",
		     		       	data:{'id':id},
		     		       	url: "../controller/cDeleteUser.php", 

		     		       	success: function(result){  
		     		       		
		     		       		console.log(result);
		     		       		alert(result);
		     		       		location.reload(true);  //recarga la pagina
		     		       	},
		     		       	error : function(xhr) {
		     		   			alert("An error occured: " + xhr.status + " " + xhr.statusText);
		     		   		}
		     		       });
		 	       });
		     		    });
        },
        error: function(xhr){
            alert("An error occured: "+xhr.status+" "+xhr.statusText);
        }
    });
	}
/*
function iniciarRAdmin(){
	$.ajax({
        type:"JSON",
        url:"../controller/cMostrarReservas.php",
        success: function(datosR){


 * alert(datos); alert("success");
             midatoR=JSON.parse(datosR);


			$.each(midatoR,function(i,datoR){
			
			
			            $(".rellenoAdminUsuario").append(`<tr>
			            		<td>`+datoR.idReserva+`</td>            		
			            		<td>`+datoR.fechaReserva+`</td>
			            		<td>`+datoR.fechaReservada+`</td>
			            		<td>`+datoR.horaInicio+`</td>
			            		<td>`+datoR.horaFin+`</td>
			            		<td>`+datoR.idUsuario+`</td>
			            		<td>`+datoR.idVehiculo+`</td>
			            		<td><button class="deleteR delete_paneles value="`+datoR.idReserva+`">DELETE</button></td>
			            		<td><button class="updateR update_paneles">UPDATE</button></td>
			        		</tr>`);
			});
        },
        error: function(xhr){
            alert("An error occured: "+xhr.status+" "+xhr.statusText);
        }
    });
	}*/



/*FIN DE INICIAR LAS TABLAS EN LA VISTA ADMIN */

/*INICIO DE INSERTAR DATOS EN LAS TABLAS DESDE VADMIN */

function onclick_vAdminVehiculo() {
    // do your things
   
//	alert("Esto es el submit vehiculo");
		
	var nombre=$("#nombre").val();
	var modelo=$("#modelo").val();
	var potencia=$("#potencia").val();
	var img=$("#img").val();
	var tipo=$("#tipo").val();
	
	
	$.ajax({
	 	type: "GET",
	 	data:{ 'nombre':nombre, 'modelo':modelo,'potencia':potencia,'img':img,'tipo':tipo },
	 	url: "../controller/cInsertVehiculo.php", 
	
	 	success: function(result){  
	 		
	 		console.log(result);
	 		alert(result);
	 		location.reload(true);  //recarga la pagina
	 	},
	 	error : function(xhr) {
				alert("An error occured: " + xhr.status + " " + xhr.statusText);
			}
	 });
}


function onclick_vAdminUsuario() {
    // do your things
   
	alert("Esto es el submit usuario");
	var usuario=$("#usuario").val();
	var contrasena=$("#contrasena").val();
	var nombre=$("#nombre").val();
	var apellido=$("#apellido").val();
	var telefono=$("#telefono").val();
	var dni=$("#dni").val();
	var tipo=$("#tipo").val();
	
	
	$.ajax({
	 	type: "GET",
	 	data:{'usuario':usuario , 'contrasena':contrasena , 'nombre':nombre, 'apellido':apellido , 'telefono':telefono , 'dni':dni , 'tipo':tipo },
	 	url: "../controller/cInsertUsuario.php", 
	
	 	success: function(result){  
	 		
	 		console.log(result);
	 		alert(result);
	 		location.reload(true);  //recarga la pagina
	 	},
	 	error : function(xhr) {
				alert("An error occured: " + xhr.status + " " + xhr.statusText);
			}
	 });
}
/*FIN DE INSERTAR DATOS EN LAS TABLAS DESDE VADMIN */