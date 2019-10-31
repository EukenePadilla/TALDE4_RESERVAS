<?php


include_once ("../model/reservaModel.php");

$reserva=new reservaModel();

$id=filter_input(INPUT_GET,"id");

if (isset($id))
{
    $reserva->setIdReserva($id);
}

$resultado=$reserva->delete();
echo $resultado;

//header('Location: ../index.php');
?>
