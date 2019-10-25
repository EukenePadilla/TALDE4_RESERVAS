<?php


include_once ("../model/userModel.php");

$usuario=new userModel();

$id=filter_input(INPUT_GET,"id");

if (isset($id))
{
    $usuario->setIdUsuario($id);
}

$resultado=$usuario->delete();
echo $resultado;

//header('Location: ../index.php');
?>
