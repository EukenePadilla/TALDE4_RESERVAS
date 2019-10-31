<?php
include_once ("../model/userModel.php");

$usuario_nuevo= new userModel();

$datosLogin=json_decode($_GET['datosUser']);
$user=$datosLogin->usuario;

$usuario_nuevo->setUsuario($user);


$usuario_nuevo->setUsuarioRegister();

$result=$usuario_nuevo->getUsuarioRegister();

$result=json_encode($result);
echo ($result);
unset ($usuario_nuevo);

?>