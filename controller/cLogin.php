<?php
include_once ("../model/userModel.php");
session_start();
$usuario_nuevo= new userModel();

$datosLogin=json_decode($_GET['datosUser']);

$user=$datosLogin->usuario;
$contrasena=$datosLogin->contrasena;

$usuario_nuevo->setUsuario($user);
$usuario_nuevo->setContrasena($contrasena);

$_SESSION['usuario']=$user;
$usuario_nuevo->setUsuarioLogin();

$result=$usuario_nuevo->getUsuarioLogin();

$result=json_encode($result);
echo ($result);
unset ($usuario_nuevo);

?>