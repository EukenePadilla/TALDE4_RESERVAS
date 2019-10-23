<?php
include_once ("../model/vehiculoModel.php");

$vehiculo= new vehiculoModel();
$vehiculo->setList();

$listaVehiculos=$vehiculo->getList();
$listaVehiculos=json_encode($listaVehiculos);
echo ($listaVehiculos);
unset ($vehiculo);

?>