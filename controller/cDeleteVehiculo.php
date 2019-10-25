<?php


include_once ("../model/libro_model.php");

$libro=new reservaModel();

$id=filter_input(INPUT_GET,"id");

if (isset($id))
{
    $libro->setId($id );
}

$resultado=$libro->delete();
echo $resultado;

//header('Location: ../index.php');
?>
