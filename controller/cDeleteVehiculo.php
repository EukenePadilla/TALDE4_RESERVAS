<?php


include_once ("../model/vehiculoModel.php");

$vehiculo=new vehiculoModel();

$id=filter_input(INPUT_GET,"id");

if (isset($id))
{
    $vehiculo->setIdVehiculo($id );
}

$resultado=$vehiculo->delete();
echo $resultado;

//header('Location: ../index.php');
?>
