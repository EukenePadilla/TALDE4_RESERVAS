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

$(document).ready(function(){
/*	alert("ready");
*/	$.ajax({
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

            	 $(".reservas_v_container").append("<div class='row'>" +
             	 		"<div class='col-12 bg-dark border border-dark rounded-pill'>"+
                    "<h2 class='text-center '>"+mota+"</h2></div></div>");
                 });/*termina aqui el each de los titulos*/
            	 
             
             
             
             
            	/* 

                                   
                     + "<div class='row reservas_vehiculos'>"                                 
         if(dato.tipo=="Bicicleta"){	
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
            
       </div>
            	 ")
                 
*/
           
        },
        error: function(xhr){
            alert("An error occured: "+xhr.status+" "+xhr.statusText);
        }
    });
	
});

