<?php
if($_SERVER['SERVER_NAME']=="cuatro.fpz1920.com"){
    include_once ("connect_data_remote.php");
}else{
    include_once ("connect_data_local.php");
}
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
        $konDat=new connect_data();
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
    
    public function setList()
    {
        $this->OpenConnect();  // konexioa zabaldu  - abrir conexión
        $sql = "CALL spSelectAllReservas()"; // SQL sententzia - sentencia SQL
        
        $result = $this->link->query($sql); // result-en ddbb-ari eskatutako informazio dena gordetzen da
        // se guarda en result toda la información solicitada a la bbdd
        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            
            $nuevoVehiculo=new self();
            $nuevoVehiculo->setIdReserva($row['idReserva']);
            $nuevoVehiculo->setFechaReserva($row['fechaReserva']);
            $nuevoVehiculo->setFechaReservada($row['fechaReservada']);
            $nuevoVehiculo->setRango($row['rango']);
            $nuevoVehiculo->setPrecio($row['precio']);
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
    public function comprobarReserva()
    {
        $this->OpenConnect();
        
        $fechaReserva="'".$this->getFechaReserva()."'";
        $fechaReservada="'".$this->getFechaReservada()."'";
        
        $rango=$this->getRango();
        $precio=30;
        $idUsuario= $this->getIdUsuario();
        $idVehiculo= $this->getIdVehiculo();
        $sql = "CALL spComprobarReservas($fechaReservada, $rango, $idVehiculo)";
        $row;
        $resultado = $this->link->query($sql);
        //$sql = "CALL spInsert('nuevo', 'ssss', 55)";

        if ( $this->link->affected_rows >=1)
        {
            return "Reserva no disponible.";
        }else{
            $this->CloseConnect();
            $this->OpenConnect();
            
            $sql2 = "CALL spInsertReservas($fechaReserva, $fechaReservada, $rango, $precio, $idUsuario,$idVehiculo)";
            if ($this->link->query($sql2)>=1) // insert egiten da
            {
                return "la reserva se ha insertado con exito";
            } else {
                return "Fall� la borrado del libro: (" . $this->link->errno . ") " . $this->link->error;
            }
            
//             if ( $this->link->affected_rows >=1) // delete egiten da
//             {
//             $row = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
        }
       
        
        $this->CloseConnect();
    }
    public function delete()
    {
        $this->OpenConnect();
        
        $id=$this->getIdReserva();
        
        $sql = "CALL spDeleteReserva($id)";
        
        if ($this->link->query($sql)>=1) // delete egiten da
        {
            return "la reserva se ha borrado con exito";
        } else {
            return "Fall� la borrado del libro: (" . $this->link->errno . ") " . $this->link->error;
        }
        
        $this->CloseConnect();
    }
    
    public function update()
    {
        $this->OpenConnect();
        
        $id=$this->getIdReserva();
        $fechaReserva=$this->getFechaReserva();
        $fechaReservada=$this->getFechaReservada();
        $rango=$this->getRango();
        $precio= $this->getPrecio();
        $idUsuario= $this->getIdUsuario();
        $idVehiculo= $this->getIdVehiculo();
        
        $sql = "CALL spUpdateReservas($id,'$fechaReserva', '$fechaReservada', '$rango', '$precio', '$idUsuario', '$idVehiculo')";
        //$sql = "CALL spInsert('nuevo', 'ssss', 55)";
        
        if ($this->link->query($sql)>=1) // insert egiten da
        {
            return "la reserva se ha modificado con exito";
        } else {
            return "Fall� la insercion de reserva: (" . $this->link->errno . ") " . $this->link->error;
        }
        
        $this->CloseConnect();
    }
    
}
?>