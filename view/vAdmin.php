<html>
<head>
<title>Administracion</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/scriptAdmin.js" type="text/javascript"></script>

<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<header class="encabezado_vAdmin">
		<h1>Admin</h1>
	</header>

    	<div class="panelV paneles" id="panelV">
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
    </div>
<div class="panelU paneles" id="panelU">
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
    </div>    
    
<div class="panelR paneles" id="panelR">
			<div class="titulo_boton">
    		<h2 class="tituloRAdmin">RESERVAS</h2>
    		<button class="insertR insert_paneles">INSERT</button>
    		</div>
    		<table class="rellenoAdminReserva">
    			<tr>
    			
         			<th>IDRESERVA</th>
         			<th>FECHA RESERVA</th> 
         			<th>FECHA RESERVADA</th> 
         			<th>HORA INICIO</th>
         			<th>HORA FIN</th>
         			<th>ID USUARIO</th>
         			<th>ID VEHICULO</th>
         			<th>DELETE</th>
         			<th>UPDATE</th>
        		</tr>
        	</table>
        	        		
    	</div>
    </div>    
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
		integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
		crossorigin="anonymous"></script>
</body>
</html>

