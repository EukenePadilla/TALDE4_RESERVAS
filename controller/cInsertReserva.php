<?php

include_once ("../model/reservaModel.php");

$reserva=new reservaModel();

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

$rango=filter_input(INPUT_GET,"rango");
if (isset($rango))
{
    $reserva->setRango($rango);
}

$precio=filter_input(INPUT_GET,"precio");
if (isset($precio))
{
    $reserva->setPrecio($precio);
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
$resultado=$reserva->comprobarReserva();

echo $resultado;   // pasar a AJAX el resultado

//header('Location: ../index.php');
?>