<?php

class reservaClass{
    protected $idReserva;
    protected $fechaReserva;
    protected $fechaReservada;
    protected $rango;
    protected $precio;
    protected $idUsuario;
    protected $idVehiculo;
    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    /**
     * @return mixed
     */
    public function getRango()
    {
        return $this->rango;
    }

    /**
     * @param mixed $rango
     */
    public function setRango($rango)
    {
        $this->rango = $rango;
    }

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