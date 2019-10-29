<?php
include_once ("../model/userModel.php");

$usuario_nuevo= new userModel();

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

$result=$usuario_nuevo->comprobarUser();

unset ($usuario);

?>