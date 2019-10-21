<?php
include_once ("../model/vehiculoModel.php");

$vehiculo= new vehiculoModel();
$vehiculo->setList();

$listaVehiculos=$vehiculo->getList();


unset ($vehiculo);

?>