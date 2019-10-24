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
$(document).ready(function(){
/*	alert("ready");
*/	
	iniciar_frontal();
	iniciar_reservas();

//	$.ajax({
//        type:"JSON",
//        url:"controller/cIndex.php",
//        success: function(datos){
///*            alert(datos);
//       	alert("success");
//*/            midato=JSON.parse(datos);
//            
//             $.each(midato,function(i,dato){
//            	 /* despues de haber creado la variable tipo, hemos recorrido toda la tabla vehiculos
//            	  * y si el tipo no estaba guardado en el array tipos, se hara un push para guardarlo ahi.
//             */
//            	 var tipo =dato.tipo.toLowerCase();
//
//            	 if(!tipos.includes(tipo)){
//            		tipos.push(dato.tipo.toLowerCase());
////            		alert(tipos);
//            	}
////            	 index.html#`+dato.tipo+`
//             });/*termina aqui el each del array de tipos*/
//            	 
//                 $.each(midato,function(i,dato){
//                	 if(m!=dato.tipo){
//                		 m=dato.tipo;
//                		 $(".frontal_container").append(`<div class="mx-auto col-3 text-center">
//                                 <a href="index.html#`+dato.tipo.toLowerCase()+`"><div class="card card_frontal" >
//                                         
//                                     <img src="`+dato.img+`" class="card-img-top" alt="`+dato.img+`">
//                                     <div class="card-body">
//                                         <a href="index.html#`+dato.tipo.toLowerCase()+`" class="btn btn-primary btn-block">`+dato.tipo+`</a></a>
//                                     </a>
//                                 </div>
//                         </div>
//                        `);
//                	 }
//                              });/*termina aqui el each de los datos del frontal*/
//
//                	 
//            	 
//        },
//        error: function(xhr){
//            alert("An error occured: "+xhr.status+" "+xhr.statusText);
//        }
//    });
	
});

function registro(){
	var usuario=$("#user").val();
	var contrasena=$("#password").val();
	
	
}

function iniciar_frontal(){
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
                	           Tipo: `+dato.tipo+`</p></div></div></div>`);
                	 }
/*                		 alert("hola");
*/                		 
                	 });/*termina el each con el que se sacan los podructos por tipo*/
                 });/*termina aqui el each de los titulos de reservas*/
        },
        error: function(xhr){
            alert("An error occured: "+xhr.status+" "+xhr.statusText);
        }
    });
	}