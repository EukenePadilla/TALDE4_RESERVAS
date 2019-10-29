var midato= new Object();
var tipos = [];
var m;//variable utilizada en frontal para sacar los tipos
$(document).ready(function(){

	$("#iniciar_sesion").click(function(){


	
		$usuario =$("#userInputUsername").val();
		$contrasena =$("#userInputPassword").val();
		//alert($usuario+" "+$contrasena);
				
		$.ajax({
				
			 	type:"GET",
		        data:{'usuario':usuario,'contrasena':contrasena},
		        url:"../controller/cLogin.php",
//		        datatype:json,
		        success: function(result){
//		        	userdata=JSON.parse(datos);
		        },
		        error: function(xhr){
		            alert("An error occured: "+xhr.status+" "+xhr.statusText);
		        }

	
	
		});
	});

});
