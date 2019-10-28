<?php

include_once ("../model/userModel.php");

$usuario_nuevo=new userModel();


$id=filter_input(INPUT_GET,"id");
if (isset($id))
{
    $usuario_nuevo->setIdUsuario($id);
}


$resultado=$usuario_nuevo->findIdUsuario();

echo $resultado;   // pasar a AJAX el resultado

//header('Location: ../index.php');
?>