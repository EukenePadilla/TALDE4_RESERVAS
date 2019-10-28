<?php

include_once ("../model/vehiculoModel.php");

$vehiculo=new vehiculoModel();

$id=filter_input(INPUT_GET,"id");

if (isset($id))
{
    $vehiculo->setIdVehiculo($id );
}

$nombre=filter_input(INPUT_GET,"nombre");
if (isset($nombre))
{
    $vehiculo->setNombre($nombre);
}

$modelo=filter_input(INPUT_GET,"modelo");
if (isset($modelo))
{
    $vehiculo->setModelo($modelo);
}

$potencia=filter_input(INPUT_GET,"potencia");
if (isset($potencia))
{
    $vehiculo->setPotencia($potencia);
}

$img=filter_input(INPUT_GET,"img");
if (isset($img))
{
    $vehiculo->setImg($img);
}

$tipo=filter_input(INPUT_GET,"tipo");
if (isset($tipo))
{
    $vehiculo->setTipo($tipo);
}

$resultado=$vehiculo->update();

echo $resultado;   // pasar a AJAX el resultado

//header('Location: ../index.php');
?>