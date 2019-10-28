<?php
include_once ("../model/userModel.php");

$user=filter_input(INPUT_GET,"user");
$password=filter_input(INPUT_GET,"password");

$usuario= new userModel();
$usuario->setUsuario($user);
$usuario->setContrasena($password);

$result=$usuario->comprobarUser();

echo("esto en Clogin");


unset ($usuario);

?>