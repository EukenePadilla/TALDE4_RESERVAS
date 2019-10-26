<?php

include_once ("../model/userModel.php");

$usuario=new userModel();



$usuario=filter_input(INPUT_GET,"usuario");
if (isset($usuario))
{
    $usuario->setUsuario($usuario);
}

$contrasena=filter_input(INPUT_GET,"contrasena");
if (isset($contrasena))
{
    $usuario->setContrasena($contrasena);
}

$nombre=filter_input(INPUT_GET,"nombre");
if (isset($nombre))
{
    $usuario->setNombre($nombre);
}

$apellido=filter_input(INPUT_GET,"apellido");
if (isset($apellido))
{
    $usuario->setApellido($apellido);
}

$telefono=filter_input(INPUT_GET,"telefono");
if (isset($telefono))
{
    $usuario->setTelefono($telefono);
}

$dni=filter_input(INPUT_GET,"dni");
if (isset($dni))
{
    $usuario->setDni($dni);
}

$tipo=filter_input(INPUT_GET,"tipo");
if (isset($tipo))
{
    $usuario->setTipo($tipo);
}

$resultado=$usuario->insert();

echo $resultado;   // pasar a AJAX el resultado

//header('Location: ../index.php');
?>