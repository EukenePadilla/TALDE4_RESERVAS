<?php

include_once ("../model/userModel.php");

$usuario_nuevo=new userModel();



$usuario=filter_input(INPUT_GET,"usuario");
if (isset($usuario))
{
    $usuario_nuevo->setUsuario($usuario);
}

$contrasena=filter_input(INPUT_GET,"contrasena");
if (isset($contrasena))
{
    $usuario_nuevo->setContrasena($contrasena);
}

$nombre=filter_input(INPUT_GET,"nombre");
if (isset($nombre))
{
    $usuario_nuevo->setNombre($nombre);
}

$apellido=filter_input(INPUT_GET,"apellido");
if (isset($apellido))
{
    $usuario_nuevo->setApellido($apellido);
}

$telefono=filter_input(INPUT_GET,"telefono");
if (isset($telefono))
{
    $usuario_nuevo->setTelefono($telefono);
}

$dni=filter_input(INPUT_GET,"dni");
if (isset($dni))
{
    $usuario_nuevo->setDni($dni);
}

$tipo=filter_input(INPUT_GET,"tipo");
if (isset($tipo))
{
    $usuario_nuevo->setTipo($tipo);
}

$resultado=$usuario_nuevo->insert();

echo $resultado;   // pasar a AJAX el resultado

//header('Location: ../index.php');
?>