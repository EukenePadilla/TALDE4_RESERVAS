<?php

include_once ("connect_data.php");
include_once ("userClass.php");
include_once ("reservaModel.php");
include_once ("vehiculoModel.php");

class userModel extends userClass
{
    private $link;
    private $list=array();         //editorial guztien lista - lista de todas editoriales
    private $listaUsers=array(); // editorial honen liburu guztiak - libros de una editorial
    
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
    
    public function findIdUsuario($idUsuario)
    {
        // echo "$idEditorial"; //ok
        $this->OpenConnect();
        $sql = "CALL spFindIdUsuario($idUsuario)";
        
        $result = $this->link->query($sql);
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            
            $this->setIdUsuario($row['idUsuario']);
            $this->setNombre($row['nombre']);
            $this->setApellido($row['apellido']);
            $this->setTelefono($row['telefono']);
            $this->setDni($row['dni']);
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
        $sql = "CALL spAllUsuarios()"; // SQL sententzia - sentencia SQL
        
        $result = $this->link->query($sql); // result-en ddbb-ari eskatutako informazio dena gordetzen da
        // se guarda en result toda la información solicitada a la bbdd
        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            
            $nuevoUsuario=new self();
            $nuevoUsuario->setIdUsuario($row['idUsuario']);
            $nuevoUsuario->setNombre($row['nombre']);
            $nuevoUsuario->setApellido($row['apellido']);
            $nuevoUsuario->setTelefono($row['telefono']);
            $nuevoUsuario->setDni($row['dni']);
            $nuevoUsuario->setTipo($row['tipo']);
            
            
            //             $user=new userModel(); //para llamar a la función de libro_model
            
            //             $nuevoVehiculo->listaVehiculos=$user->findEditorialBooks($row['idEditorial']);
            //             // honek itzultzen digu editorial bateko liburu guztien zerrenda
            
            array_push($this->list, $nuevoUsuario);
        }
        mysqli_free_result($result);
        //         unset($listaLibrosEditorial);
        $this->CloseConnect();
    }
    
}
?>