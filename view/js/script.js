/*<div class="container-fluid reservas_v_container">
        <div class="row">
            <div class="col-12 bg-dark border border-dark rounded-pill">
              <h2 class="text-center ">BICICLETAS</h2>
            </div>
        </div>
        <div class="row reservas_vehiculos">


                <?php               
                            foreach ($listaVehiculos as $vehiculo)
                            {       
                                ?>                              <?php   
                                if($vehiculo->getTipo()=="Bicicleta"){	?>
                         	      <div class="card mx-auto col-2" >
                         	      <img src="<?php echo $vehiculo->getImg();?>" class="card-img-top" alt="<?php echo $vehiculo->getImg();?> ">
                         		  <div class="card-body">
                                  <p class="card-text">
                                  Nombre: <?php echo $vehiculo->getNombre();?> <br>
                                  Modelo: <?php echo $vehiculo->getModelo();?> <br>
                                  Potencia: <?php echo $vehiculo->getPotencia();?> <br>
                                  Tipo: <?php echo $vehiculo->getTipo();?></p>
                                  </div>
                                  </div>
                                  
                              <?php   
                            }   	
                             } ?>
  </div>
                             
<div class="row">
            <div class="col-12 bg-dark border border-dark rounded-pill">
              <h2 class="text-center ">MONOPATIN</h2>
            </div>
        </div>
        <div class="row reservas_vehiculos">


                <?php               
                            foreach ($listaVehiculos as $vehiculo)
                            {       
                                ?>                              <?php   
                                if($vehiculo->getTipo()=="Monopatin"){	?>
                         	      <div class="card mx-auto col-2" >
                         	      <img src="<?php echo $vehiculo->getImg();?>" class="card-img-top" alt="<?php echo $vehiculo->getImg();?> ">
                         		  <div class="card-body">
                                  <p class="card-text">
                                  Nombre: <?php echo $vehiculo->getNombre();?> <br>
                                  Modelo: <?php echo $vehiculo->getModelo();?> <br>
                                  Potencia: <?php echo $vehiculo->getPotencia();?> <br>
                                  Tipo: <?php echo $vehiculo->getTipo();?></p>
                                  </div>
                                  </div>
                                  
                              <?php   
                            }   	
                             } ?>
        </div>
<div class="row">
            <div class="col-12 bg-dark border border-dark rounded-pill">
              <h2 class="text-center ">PATINETE</h2>
            </div>
        </div>
        <div class="row reservas_vehiculos">


                <?php               
                            foreach ($listaVehiculos as $vehiculo)
                            {       
                                ?>                              <?php   
                                if($vehiculo->getTipo()=="Patinete"){	?>
                         	      <div class="card mx-auto col-2" >
                         	      <img src="<?php echo $vehiculo->getImg();?>" class="card-img-top" alt="<?php echo $vehiculo->getImg();?> ">
                         		  <div class="card-body">
                                  <p class="card-text">
                                  Nombre: <?php echo $vehiculo->getNombre();?> <br>
                                  Modelo: <?php echo $vehiculo->getModelo();?> <br>
                                  Potencia: <?php echo $vehiculo->getPotencia();?> <br>
                                  Tipo: <?php echo $vehiculo->getTipo();?></p>
                                  </div>
                                  </div>
                              <?php   
                            }   	
                             } ?>
        </div>        
<div class="row">
            <div class="col-12 bg-dark border border-dark rounded-pill">
              <h2 class="text-center ">COCHE</h2>
            </div>
        </div>
        <div class="row reservas_vehiculos">


                <?php               
                            foreach ($listaVehiculos as $vehiculo)
                            {       
                                ?>                              <?php   
                                if($vehiculo->getTipo()=="coche"){	?>
                         	      <div class="card mx-auto col-2" >
                         	      <img src="<?php echo $vehiculo->getImg();?>" class="card-img-top" alt="<?php echo $vehiculo->getImg();?> ">
                         		  <div class="card-body">
                                  <p class="card-text">
                                  Nombre: <?php echo $vehiculo->getNombre();?> <br>
                                  Modelo: <?php echo $vehiculo->getModelo();?> <br>
                                  Potencia: <?php echo $vehiculo->getPotencia();?> <br>
                                  Tipo: <?php echo $vehiculo->getTipo();?></p>
                                  </div>
                                  </div>
                              <?php   
                            }   	
                             } ?>
        </div>        
        </div>

*/
var midato= new Object();
var tipos = [];
var m;//variable utilizada en frontal para sacar los tipos
var idVehiculo;// variable utilizada para coger la idVehiculo en reserva.
$(document).ready(function(){

	iniciar_frontal();
	iniciar_reservas();
	
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
		        	alert("holaaaa");
		        	alert(result);
		        	console.log(result);

		        },
		        error: function(xhr){
		            alert("An error occured: "+xhr.status+" "+xhr.statusText);
		        }
		});
	});
	
$("#inputRegistro").click(function(){
		
	var usuario=$("#createInputUsuario").val();
	var contrasena=$("#createInputContrasena").val();
	var nombre=$("#createInputNombre").val();
	var apellido=$("#createInputApellido").val();
	var telefono=$("#createInputTelefono").val();
	var dni=$("#createInputDni").val();
	
//$(document).on('change', '#createInputTipo', function(event) {
//     $('#createInputTipo').val($("#createInputTipo option:selected").text());
//});
	var tipo=$("#createInputTipo").val();
	
	
	$.ajax({
	 	type: "GET",
	 	data:{'usuario':usuario , 'contrasena':contrasena , 'nombre':nombre, 'apellido':apellido , 'telefono':telefono , 'dni':dni , 'tipo':tipo },
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
	});

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
                		 $(".frontal_container").append(`<div class="mx-auto col-3 text-center">
                                 <a href="index.html#`+dato.tipo.toLowerCase()+`"><div class="card card_frontal" >
                                         
                                     <img src="`+dato.img+`" class="card-img-top" alt="`+dato.img+`">
                                     <div class="card-body">
                                         <a href="index.html#`+dato.tipo.toLowerCase()+`" class="btn btn-primary btn-block">`+dato.tipo+`</a></a>
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
                	 $("."+mota).append(`<div class="card mx-auto col-2 cards_reserva" >
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
               	$hInicio =$("#reservaInputInicio").val();
               	$hFinal =$("#reservaInputFin").val();
               	
               	var $idUsuario = 1;
               	alert(idVehiculo + " idvehiculo" + 
               			$idUsuario + " idUsuario" +
               			$fReserva +" reserva" + 
               			$fReservada +" reservada" + 
               			$hInicio+ " inicio" +
               			$hFinal +" final");
//               	alert($idUsuario + " idusuario");
               	
               	$.ajax({
           			
           		 	type:"GET",
           	        data:{'fechaReserva':$fReserva,'fechaReservada':$fReservada ,
           	        	'horaInicio':$hInicio , 'horaFin':$hFinal,
           	        	'idUsuario':$idUsuario, 'idVehiculo':idVehiculo },
           	        url:"controller/cInsertReserva.php",
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