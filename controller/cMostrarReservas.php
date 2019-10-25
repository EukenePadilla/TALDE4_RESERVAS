<?php
include_once ("../model/reservaModel.php");

$reserva= new reservaModel();
$reserva->setList();

$listaReservas=$reserva->getList();
$listaReservas=json_encode($listaReservas);
echo ($listaReservas);
unset ($reserva);

?>