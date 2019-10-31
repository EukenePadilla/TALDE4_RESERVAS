<?php

include_once ("../model/reservaModel.php");

$reserva=new reservaModel();

$id=filter_input(INPUT_GET,"id");

if (isset($id))
{
    $reserva->setIdReserva($id);
}
$fechaReserva=filter_input(INPUT_GET,"fechaReserva");
if (isset($fechaReserva))
{
    $reserva->setFechaReserva($fechaReserva);
}

$fechaReservada=filter_input(INPUT_GET,"fechaReservada");
if (isset($fechaReservada))
{
    $reserva->setFechaReservada($fechaReservada);
}

$horaInicio=filter_input(INPUT_GET,"horaInicio");
if (isset($horaInicio))
{
    $reserva->setHoraInicio($horaInicio);
}

$horaFin=filter_input(INPUT_GET,"horaFin");
if (isset($horaFin))
{
    $reserva->setHoraFin($horaFin);
}

$idUsuario=filter_input(INPUT_GET,"idUsuario");
if (isset($idUsuario))
{
    $reserva->setIdUsuario($idUsuario);
}
$idVehiculo=filter_input(INPUT_GET,"idVehiculo");
if (isset($idVehiculo))
{
    $reserva->setIdVehiculo($idVehiculo);
}
$resultado=$reserva->update();

echo $resultado;   // pasar a AJAX el resultado

//header('Location: ../index.php');
?>