<?php

include_once ("connect_data.php");
include_once ("vehiculoClass.php");
include_once ("reservaModel.php");
include_once ("userModel.php");

class vehiculoModel extends vehiculoClass
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
    
    public function findIdVehiculo($idVehiculo)
    {
        // echo "$idEditorial"; //ok
        $this->OpenConnect();
        $sql = "CALL spEncontrarIdVehiculo($idVehiculo)";
        
        $result = $this->link->query($sql);
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            
            $this->setIdVehiculo($row['idVehiculo']);
            $this->setNombre($row['nombre']);
            $this->setModel($row['modelo']);
            $this->setPotencia($row['potencia']);
            $this->setImg($row['img']);
            $this->setTipo($row['tipo']);
            
            //echo $row['nombreEditorial'];  //ok
            //  echo $new->getNombreEditorial();  //ok
        }
        mysqli_free_result($result);
        $this->CloseConnect();
        // echo $this->getCiudad(); //ok
        return $this;
    }
    
    public function setList()
    {
        $this->OpenConnect();  // konexioa zabaldu  - abrir conexión
        $sql = "CALL spSeleccionarTodosVehiculos()"; // SQL sententzia - sentencia SQL
        
        $result = $this->link->query($sql); // result-en ddbb-ari eskatutako informazio dena gordetzen da
        // se guarda en result toda la información solicitada a la bbdd
        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            
            $nuevoVehiculo=new self();
            $nuevoVehiculo->setIdVehiculo($row['idVehiculo']);
            $nuevoVehiculo->setNombre($row['nombre']);
            $nuevoVehiculo->setModel($row['modelo']);
            $nuevoVehiculo->setPotencia($row['potencia']);
            $nuevoVehiculo->setImg($row['img']);
            $nuevoVehiculo->setTipo($row['tipo']);
            
            
//             $user=new userModel(); //para llamar a la función de libro_model
            
//             $nuevoVehiculo->listaVehiculos=$user->findEditorialBooks($row['idEditorial']);
//             // honek itzultzen digu editorial bateko liburu guztien zerrenda
            
            array_push($this->list, $nuevoVehiculo);
        }
        mysqli_free_result($result);
//         unset($listaLibrosEditorial);
        $this->CloseConnect();
    }
    
}
?>