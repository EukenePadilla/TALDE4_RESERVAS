<?php

class reservaClass{
    protected $idReserva;
    protected $fechaReserva;
    protected $fechaReservada;
    protected $horaInicio;
    protected $horaFin;
    protected $idUsuario;
    protected $idVehiculo;
    /**
     * @return mixed
     */
    public function getIdReserva()
    {
        return $this->idReserva;
    }

    /**
     * @return mixed
     */
    public function getFechaReserva()
    {
        return $this->fechaReserva;
    }

    /**
     * @return mixed
     */
    public function getFechaReservada()
    {
        return $this->fechaReservada;
    }

    /**
     * @return mixed
     */
    public function getHoraInicio()
    {
        return $this->horaInicio;
    }

    /**
     * @return mixed
     */
    public function getHoraFin()
    {
        return $this->horaFin;
    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * @return mixed
     */
    public function getIdVehiculo()
    {
        return $this->idVehiculo;
    }

    /**
     * @param mixed $idReserva
     */
    public function setIdReserva($idReserva)
    {
        $this->idReserva = $idReserva;
    }

    /**
     * @param mixed $fechaReserva
     */
    public function setFechaReserva($fechaReserva)
    {
        $this->fechaReserva = $fechaReserva;
    }

    /**
     * @param mixed $fechaReservada
     */
    public function setFechaReservada($fechaReservada)
    {
        $this->fechaReservada = $fechaReservada;
    }

    /**
     * @param mixed $horaInicio
     */
    public function setHoraInicio($horaInicio)
    {
        $this->horaInicio = $horaInicio;
    }

    /**
     * @param mixed $horaFin
     */
    public function setHoraFin($horaFin)
    {
        $this->horaFin = $horaFin;
    }

    /**
     * @param mixed $idUsuario
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    /**
     * @param mixed $idVehiculo
     */
    public function setIdVehiculo($idVehiculo)
    {
        $this->idVehiculo = $idVehiculo;
    }

    
    
    
    
}