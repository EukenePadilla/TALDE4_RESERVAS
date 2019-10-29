<?php
include_once ("../model/userModel.php");

$usuario_nuevo= new userModel();

$usuario=filter_input(INPUT_GET,"usuario");

    $usuario_nuevo->setUsuario($usuario);


$contrasena=filter_input(INPUT_GET,"contrasena");

    $usuario_nuevo->setContrasena($contrasena);


$usuario_nuevo->setUsuarioLogin();

$result=$usuario_nuevo->getUsuarioLogin();

$result=json_encode($result);
echo ($result);
unset ($usuario_nuevo);

?>