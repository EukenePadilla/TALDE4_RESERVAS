<!DOCTYPE html>
<?php 
//     $DR = $_SERVER['DOCUMENT_ROOT'];
    include_once ("controller/cIndex.php");
?>
<html>
<head>
<meta charset="UTF-8">
<title>Eco Vehicles</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="view/css/style.css">


</head>
<!-- //////////////////////EDER//////////////////////////// -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="index.php">
  <img style="width:50px;" src="images/logo.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  	
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="#">Bicicletas <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Patinetes</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="#">Monopatines</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="#">Coches</a>
      </li>
      
      
    </ul >
     <ul class="navbar-nav  my-2 my-lg-0">
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Log In
          </button>
      		<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
            <button class="dropdown-item" type="button" data-toggle="modal" data-target="#userModal">User</button>
            <button class="dropdown-item" type="button" data-toggle="modal" data-target="#adminModal">Admin</button>
            <button class="dropdown-item" type="button">Log out</button>
      		</div>
    	</div>
     </ul>
  </div>
<!-- MODAL USER -->
  <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="userModalLabel">Usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          	<form>
  		      <div class="form-group">
  		        <label for="userInputUsername">Usuario</label>
    		    <input type="text" class="form-control" id="userInputUsername"placeholder="Usuario..." >
			  </div>
              <div class="form-group">
                <label for="userInputPassword">Contrasena</label>
                <input type="password" class="form-control" id="userInputPassword" placeholder="Contrasena...">
              </div>
              <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
  </div>
<!-- MODAL USER -->

<!-- MODAL ADMIN -->
  <div class="modal fade" id="adminModal" tabindex="-1" role="dialog" aria-labelledby="adminModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="adminModalLabel">Administrador</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
  		      <div class="form-group">
  		        <label for="userInputUsername">Usuario</label>
    		    <input type="text" class="form-control" id="userInputUsername"placeholder="Usuario..." >
			  </div>
              <div class="form-group">
                <label for="userInputPassword">Contrasena</label>
                <input type="password" class="form-control" id="userInputPassword" placeholder="Contrasena...">
              </div>
              <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
  </div>
<!-- MODAL ADMIN -->
  </div>
</nav>
<body>
<!-- ////////////////////////////XARLES////////////////////////////// -->
<!--/.container-->
    <div class="container-fluid">
            
        <div class="row d-flex flex-row d-custom">
            <div class="col text-center">
                    <div class="card" >
                            <a href="#">
                        <img src="images/OrtlerBozenPerformanceTrapez.jpg" class="card-img-top" alt="Bicicleta">
                        <div class="card-body">
                            <a href="#" class="btn btn-primary btn-block">Bicicletas</a></a>
                        </div>
                    </div>
            </div>
            <div class="col text-center">
                    <div class="card" >
                            <a href="#">
                        <img src="images/XiaomiMiScooterM365.jpg" class="card-img-top" alt="Patinetes">
                        <div class="card-body">
                            <a href="#" class="btn btn-primary btn-block">Patinetes</a></a>
                        </div>
                    </div>
            </div>
            <div class="col text-center">
                    <div class="card" >
                            <a href="#">
                        <img src="images/ACTONBLINKLITE450W.jpg" class="card-img-top" alt="Monopatín">
                        <div class="card-body">
                            <a href="#" class="btn btn-primary btn-block">Monopatín</a></a>
                        </div>
                    </div>
            </div>
            <div class="col text-center">
                    <div class="card" >
                            <a href="#">
                        <img src="images/BMWi3.jpg" class="card-img-top" alt="Coche">
                        <div class="card-body">
                            <a href="#" class="btn btn-primary btn-block">Coche</a></a>
                        </div>
                    </div>
            </div>
        </div>
    </div>


<!-- /////////////////////EUKENE//////////////////////////// -->

<!-- ////////////////////////////////////////////////////////////////////////
    ///////////////////////RESERVAS/////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////// -->


    <div class="container-fluid reservas_v_container">
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





<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
