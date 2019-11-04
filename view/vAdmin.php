<html>
<head>
<title>Administracion</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/scriptAdmin.js" type="text/javascript"></script>
<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<header class="encabezado_vAdmin paneles" style="margin-bottom:50px;">
		<h1>ADMIN VIEW</h1>
		
		
	</header>
<div class="paneles">
    	<div class="panelV paneles" id="panelV" style="margin-bottom:50px;">
    	<div class="titulo_boton">
    		<h2 class="tituloVAdmin">VEHICULOS</h2>
    		<button class="insertV insert_paneles" >INSERT</button>
    	</div>	
    		<table class="rellenoAdminVehiculo">
    			<tr>
    			
         			<th>ID</th> 
         			<th>NOMBRE</th>
         			<th>MODELO</th>
         			<th>POTENCIA</th>
         			<th>IMAGEN</th>
         			<th>TIPO</th>
         			<th>DELETE</th>
         			<th>UPDATE</th>
        		</tr>
        	</table>
    	</div>
<div class="panelU paneles" id="panelU" style="margin-bottom:50px;">
			<div class="titulo_boton">
    		<h2 class="tituloUAdmin">USUARIOS</h2>
    		<button class="insertU insert_paneles">INSERT</button>
    		</div>
    		<table class="rellenoAdminUsuario">
    			<tr>
    			
         			<th>IDUSUARIO</th>
         			<th>USUARIO</th> 
         			<th>CONTRASENA</th> 
         			<th>NOMBRE</th>
         			<th>APELLIDO</th>
         			<th>TELEFONO</th>
         			<th>DNI</th>
         			<th>TIPO</th>
         			<th>DELETE</th>
         			<th>UPDATE</th>
        		</tr>
        	</table>
        	        		
    	</div>
    
<div class="panelR paneles" id="panelR" style="margin-bottom:50px;">
			<div class="titulo_boton">
    		<h2 class="tituloRAdmin">RESERVAS</h2>
    		<button class="insertR insert_paneles">INSERT</button>
    		</div>
    		<table class="rellenoAdminReserva">
    			<tr>
    			
         			<th>IDRESERVA</th>
         			<th>FECHA RESERVA</th> 
         			<th>FECHA RESERVADA</th> 
         			<th>RANGO</th>
         			<th>PRECIO</th>
         			<th>ID USUARIO</th>
         			<th>ID VEHICULO</th>
         			<th>DELETE</th>
         			<th>UPDATE</th>
        		</tr>
        	</table>
        	        		
    	</div>
    </div>
    <div  class="paneles" style="margin-top:50px;"><a href="../index.php"><button class="boton_atras_vAdminV ">GO INDEX</button></a></div>
   
    <div class="insertarAdmin"></div>  
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
		integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
		crossorigin="anonymous"></script>
</body>
</html>

