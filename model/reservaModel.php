<?php

include_once ("connect_data_local.php");
include_once ("vehiculoClass.php");
include_once ("userModel.php");
include_once ("reservaClass.php");


class reservaModel extends reservaClass
{
    private $link;
    private $list=array();         //editorial guztien lista - lista de todas editoriales
    private $listaVehiculos=array(); // editorial honen liburu guztiak - libros de una editorial
    
    public function getList() {
        return $this->list;
    }
    
    public function OpenConnect()
    {
        $konDat=new connect_data_local();
        try
        {
            $this->link=new mysqli($konDat->host,$konDat->userbbdd,$konDat->passbbdd,$konDat->ddbbname);
            // mysqli klaseko link objetua sortzen da dagokion konexio datuekin
            // se crea un nuevo objeto llamado link de la clase mysqli con los datos de conexión.
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
        $this->link->set_charset("utf8"); // honek behartu egiten du aplikazio eta
        //                  //databasearen artean UTF -8 erabiltzera datuak trukatzeko
    }
    
    public function CloseConnect()
    {
        mysqli_close ($this->link);
    }
    
    public function findIdReserva($idReserva)
    {
        $this->OpenConnect();
        $sql = "CALL seleccionarTodasReservas($idReserva)";
        
        $result = $this->link->query($sql);
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            
            $nuevoVehiculo->setIdReserva($row['$idReserva']);
            $nuevoVehiculo->setFechaReserva($row['fechaReserva']);
            $nuevoVehiculo->setFechaReservada($row['fechaReservada']);
            $nuevoVehiculo->setHoraInicio($row['horaInicio']);
            $nuevoVehiculo->setHoraFin($row['horaFin']);
            $nuevoVehiculo->setIdUsuario($row['idUsuario']);
            $nuevoVehiculo->setIdVehiculo($row['idVehiculo']);
            
            //echo $row['nombreEditorial'];  //ok
            //  echo $new->getNombreEditorial();  //ok
        }
        mysqli_free_result($result);
        $this->CloseConnect();
        return $this;
    }
    
    public function setList()
    {
        $this->OpenConnect();  // konexioa zabaldu  - abrir conexión
        $sql = "CALL seleccionarTodasReservas()"; // SQL sententzia - sentencia SQL
        
        $result = $this->link->query($sql); // result-en ddbb-ari eskatutako informazio dena gordetzen da
        // se guarda en result toda la información solicitada a la bbdd
        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            
            $nuevoVehiculo=new self();
            $nuevoVehiculo->setIdReserva($row['$idReserva']);
            $nuevoVehiculo->setFechaReserva($row['fechaReserva']);
            $nuevoVehiculo->setFechaReservada($row['fechaReservada']);
            $nuevoVehiculo->setHoraInicio($row['horaInicio']);
            $nuevoVehiculo->setHoraFin($row['horaFin']);
            $nuevoVehiculo->setIdUsuario($row['idUsuario']);
            $nuevoVehiculo->setIdVehiculo($row['idVehiculo']);
            
            
            //             $user=new userModel(); //para llamar a la función de libro_model
            
            //             $nuevoVehiculo->listaVehiculos=$user->findEditorialBooks($row['idEditorial']);
            //             // honek itzultzen digu editorial bateko liburu guztien zerrenda
            
            array_push($this->list, $row);
        }
        mysqli_free_result($result);
        //         unset($listaLibrosEditorial);
        $this->CloseConnect();
    }
    
}
?>