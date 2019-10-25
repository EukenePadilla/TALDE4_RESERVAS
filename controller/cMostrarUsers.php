<?php
include_once ("../model/userModel.php");

$usuario= new userModel();
$usuario->setList();

$listaUsuarios=$usuario->getList();
$listaUsuarios=json_encode($listaUsuarios);
echo ($listaUsuarios);
unset ($usuario);

?>