<html>
<head>
<title>Administracion</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/scriptAdmin.js" type="text/javascript"></script>
<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/style2.css">
</head>

<body>
	<header class="encabezado_vAdmin">
		<h1>Admin</h1>
	</header>
<form id="form_vAdminInsertV" >
		    <div id="elementos_vAdminInsertV">
		        <div class="nombre_vAdminInsertV">
		        <label>FechaReserva:</label>
		        <input id="nombre" type="text">
		        </div>
		
		        <div class="modelo_vAdminInsertV">
		        <label>FechaReservada:</label>
		        <input id="modelo" type="text">
		        </div>
		
		        <div class="potencia_vAdminInsertV">
		        <label>HoraInicio:</label>
		        <input id="potencia" type="text">     
		        </div>
		
		        <div class="img_vAdminInsertV">
		        <label>HoraFin:</label>
		        <input id="img" type="text"> 
		        </div>
		
		        <div class="tipo_vAdminInsertV">
		        <label>Tipo:</label>
		        <input id="tipo" type="text">
		        </div>
		        
<!-- 			$nuevoVehiculo->setIdReserva($row['$idReserva']);
            $nuevoVehiculo->setIdUsuario($row['idUsuario']);
            $nuevoVehiculo->setIdVehiculo($row['idVehiculo']); -->
            
		    </div>
		    <input type="button" id="submit_vAdminInsertV" value="GO!" onclick="onclick_vAdminVehiculo()">
		    
		    <button class="boton_atras_vAdminV goBack">GO BACK</button>
		    </form>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
		integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
		crossorigin="anonymous"></script>
</body>
</html>

