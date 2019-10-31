<?php


include_once ("../model/reservaModel.php");

$reserva=new reservaModel();

$id=filter_input(INPUT_GET,"id");

if (isset($id))
{
    $vehiculo->setIdReserva($id);
}

$resultado=$vehiculo->delete();
echo $resultado;

//header('Location: ../index.php');
?>
