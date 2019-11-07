
var midato= new Object();
var usuario = {};
var userdata = {};
var tipos = [];
var $idUsuario;
var tp=-1;// para guardar el tipo de usuario en numero(1==admin, 2==usuario normal)
var m;//variable utilizada en frontal para sacar los tipos
var idVehiculo;// variable utilizada para coger la idVehiculo en reserva.
$(document).ready(function(){

	iniciar_frontal();
	iniciar_reservas();
	
	var result = localStorage.getItem('usuario');
    usuario = JSON.parse(result) || {};
    tp=usuario.tipo;
    
    if(result==null){
        $("#login").show();
        $("#register").show();  

    }else{
    	$('#userLog').html(usuario.usuario);
    	$("#userLog").show(1200); 
        $("#logout").show(1200); 
        if(tp==1){//si es administrador
            $("#admin").show(1200); 

        }
        $("#login").hide();
        $("#register").hide();
        
    };    

	$("#logout").click(function(){
        
        $.ajax({
			
	        type:"GET",
		        url:'controller/cLogout.php',

		        success: function(result){
		        	localStorage.removeItem('usuario');//quitar la variable de localstorage 
		        	$("#login").show(800);
		            $("#register").show(800);
		            $("#userLog").hide(800);
		            $("#admin").hide(800);
		            $("#logout").hide(800);
		            location.reload(true);

		        },
		        error: function(xhr){
		            alert("An error occured: "+xhr.status+" "+xhr.statusText);
		        }
		});
    });
	$("#iniciar_sesion").click(function(){
		
		$usuario =$("#userInputUsername").val();
		$contrasena =$("#userInputPassword").val();
		datosUser={'usuario':$usuario,'contrasena':$contrasena};
		datosUser=JSON.stringify(datosUser);
				
		$.ajax({
				
	        type:"GET",
		        data:{'datosUser':datosUser},
		        url:'controller/cLogin.php',

		        success: function(result){
		        	console.log(result);
		        	userdata = JSON.parse(result);
		        	$('#userLog').html(userdata[0].usuario);
		        	$("#userLog").show(1200); 
                    $("#logout").show(1200); 
                    if(userdata[0].tipo==1){//si es administrador
                        $("#admin").show(800);

                    }
                    $("#login").hide(800);
                    $("#register").hide(800);
/*                    $("#userModal").html("");
*/
		            localStorage.setItem("usuario", JSON.stringify(userdata[0]));
		            alert(JSON.stringify(userdata[0]));
		            location.reload(true);

		        },
		        error: function(xhr){
		            alert("An error occured: "+xhr.status+" "+xhr.statusText);
		        }
		});
	});
	
$("#inputRegistro").click(function(){
	
	$usuario =$("#createInputUsuario").val();
	$contrasena =$("#createInputContrasena").val();
	$reContrasena =$("#createInputReContrasena").val();
	$nombre=$("#createInputNombre").val();
	$apellido=$("#createInputApellido").val();
	$telefono=$("#createInputTelefono").val();
	$dni=$("#createInputDni").val();
	$tipo=$("#createInputTipo").val();
	
	todosUser={'usuario':$usuario,'contrasena':$contrasena,'nombre':$nombre,'apellido':$apellido,'telefono':$telefono,'dni':$dni,'tipo':$tipo};
	
	datosUser={'usuario':$usuario};
	datosUser=JSON.stringify(datosUser);
	
	$.ajax({
		
        type:"GET",
        data:{'datosUser':datosUser},
	        url:'controller/cComprobarNickname.php',

	        success: function(result){
	        	if(result.length==2){//si viene vacio(con dos corchetes), quiere decir que no hay ninguno con ese nombre de usuario
//		        	alert("esto es registro en plan bien");
		        	if($contrasena==$reContrasena){
		        		registrasUsuarioNuevo(todosUser);

		        	}else{
		        		alert("No coinciden las contraseñas.");
		        	}
	        	}else{
	        		alert("Ese nombre de usuario ya existe elije otro por dios.");
	        	}
	        	

	        },
	        error: function(xhr){
	            alert("An error occured: "+xhr.status+" "+xhr.statusText);
	        }
	});
});

function registrasUsuarioNuevo(todosUser){

	

	$.ajax({
	 	type: "GET",
	 	data:{'usuario':todosUser.usuario , 'contrasena':todosUser.contrasena , 'nombre':todosUser.nombre, 'apellido':todosUser.apellido , 'telefono':todosUser.telefono , 'dni':todosUser.dni , 'tipo':todosUser.tipo },
	 	url: "controller/cInsertUsuario.php", 
	
	 	success: function(result){  
	 		
	 		console.log(result);
	 		alert(result);
	 		location.reload(true);  //recarga la pagina
	 	},
	 	error : function(xhr) {
				alert("An error occured: " + xhr.status + " " + xhr.statusText);
			}
	 });
	
};


	

});


function iniciar_frontal(){
//	alert("frontal");
	$.ajax({
        type:"JSON",
        url:"controller/cIndex.php",
        success: function(datos){
/*            alert(datos);
       	alert("success");
*/            midato=JSON.parse(datos);
            
             $.each(midato,function(i,dato){
            	 /* despues de haber creado la variable tipo, hemos recorrido toda la tabla vehiculos
            	  * y si el tipo no estaba guardado en el array tipos, se hara un push para guardarlo ahi.
             */
            	 var tipo =dato.tipo.toLowerCase();

            	 if(!tipos.includes(tipo)){
            		tipos.push(dato.tipo.toLowerCase());
//            		alert(tipos);
            	}
//            	 index.html#`+dato.tipo+`
             });/*termina aqui el each del array de tipos*/
            	 
                 $.each(midato,function(i,dato){
                	 if(m!=dato.tipo){
                		 m=dato.tipo;
                		 $(".frontal_container").append(`<div class="mx-auto col-lg-3 col-sm-5   text-center">
                                 <a href="index.html#`+dato.tipo.toLowerCase()+`"><div class="card card_frontal" >
                                         
                                     <img src="`+dato.img+`" class="card-img-top" alt="`+dato.img+`">
                                     <div class="card-body">
                                         <a href="index.html#`+dato.tipo.toLowerCase()+`" class="btn btn-primary btn-block">`+dato.tipo+`</a>
                                     </a>
                                 </div>
                         </div>
                        `);
                	 }
                              });/*termina aqui el each de los datos del frontal*/

        },
        error: function(xhr){
            alert("An error occured: "+xhr.status+" "+xhr.statusText);
        }
    });
}

function iniciar_reservas(){
//	alert("reservas");
	$.ajax({
        type:"JSON",
        url:"controller/cIndex.php",
        success: function(datos){
/*            alert(datos);
       	alert("success");
*/            midato=JSON.parse(datos);
            
             $.each(midato,function(i,dato){
            	 /* despues de haber creado la variable tipo, hemos recorrido toda la tabla vehiculos
            	  * y si el tipo no estaba guardado en el array tipos, se hara un push para guardarlo ahi.
             */
            	 var tipo =dato.tipo.toLowerCase();

            	 if(!tipos.includes(tipo)){
            		tipos.push(dato.tipo.toLowerCase());
//            		alert(tipos);
            	}
                 
             });/*termina aqui el each del array de tipos*/
            	 
             $.each(tipos,function(i,mota){

            	 $(".reservas_v_container").append("  <hr id="+mota+"><div class='row'>" +
             	 		"<div class='col-12 bg-dark border border-dark rounded-pill'>"+
                    "<h2 class='text-center '>"+mota.toUpperCase()+"</h2></div></div>"+ "<div class='row reservas_vehiculos "+mota+"'>");

                 $.each(midato,function(i,dato){
//                	 alert("each con datos"+mota);
                	 if(mota==dato.tipo.toLowerCase()){
                	 $("."+mota).append(`<div class="card mx-auto col-lg-2 col-sm-5 mb-4 mt-4 cards_reserva" >
                	 <img src="`+dato.img+`" class="card-img-top" alt="`+dato.img+`">
                	  		  <div class="card-body">
                	           <p class="card-text">
                	           Nombre: `+dato.nombre+`<br>
                	           Modelo: `+dato.modelo+` <br>
                	           Potencia: `+dato.potencia+` <br>
                	           Tipo: `+dato.tipo+`</p>
                	           <button class="btn btn-primary btn-block reserva" type="button"
				data-toggle="modal" data-target="#reservaModal" id="`+dato.idVehiculo +`">Reserva ya</button>
                	           </div></div></div>`);
                	 }
/*                		 alert("hola");
*/                		 
                	 });/*termina el each con el que se sacan los podructos por tipo*/
                 });/*termina aqui el each de los titulos de reservas*/
             
             $(".reserva").click(function(){
            	 idVehiculo=$(this).attr("id"); 
             });
             //hacer el insert de reserva
             $(".reservar").click(function(){
           		$fReserva =$("#reservaInputreserva").val();
               	$fReservada =$("#reservaInputreservada").val();
               	$rango =$("#reservaInputRango").val();
               	
               	$.ajax({
           			
           		 	type:"GET",
           	        url:"controller/cComprobarUsuario.php",
           	        success: function($idUsuario){
           	        	
           		 		alert($idUsuario);

           	        },
           	        error: function(xhr){
           	            alert("An error occured: "+xhr.status+" "+xhr.statusText);
           	        }



           	});
               	
               	
//               	alert(idVehiculo + " -> idvehiculo ||" + 
//               			$idUsuario + " ->  idUsuario  || " +
//               			$fReserva +" ->  reserva || " + 
//               			$fReservada +" ->  reservada  || " + 
//               			$rango+ " ->  rango || ");
//               	alert($idUsuario + " idusuario");
               	$.ajax({
           			
           		 	type:"GET",
           	        data:{'fechaReserva':$fReserva,'fechaReservada':$fReservada ,
           	        	'rango':$rango,
           	        	'idUsuario':$idUsuario, 'idVehiculo':idVehiculo },
           	        url:"controller/cComprobarReserva.php",
           	        success: function(result){
           	        	console.log(result);
           		 		alert(result);
           		 		location.reload(true);
           	        },
           	        error: function(xhr){
           	            alert("An error occured: "+xhr.status+" "+xhr.statusText);
           	        }



           	});
             
           	});
        },
        error: function(xhr){
            alert("An error occured: "+xhr.status+" "+xhr.statusText);
        }
    });
	
}