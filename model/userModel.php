<?php
if($_SERVER['SERVER_NAME']=="cuatro.fpz1920.com"){
    include_once ("connect_data_remote.php");
}else{
    include_once ("connect_data_local.php");
}

include_once ("userClass.php");
include_once ("reservaModel.php");
include_once ("vehiculoModel.php");

class userModel extends userClass
{
    private $link;
    private $list=array();         //editorial guztien lista - lista de todas editoriales
    private $listaUsuarios=array(); // editorial honen liburu guztiak - libros de una editorial
    private $usuarioLogin=array();
    private $usuarioRegister=array();
    
    public function getList() {
        return $this->list;
    }
    public function getUsuarioLogin() {
        return $this->usuarioLogin;
    }
    
    public function getUsuarioRegister() {
        return $this->usuarioRegister;
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
        $sql = "CALL spSelectAllUsuarios()"; // SQL sententzia - sentencia SQL
        
        $result = $this->link->query($sql); // result-en ddbb-ari eskatutako informazio dena gordetzen da
        // se guarda en result toda la información solicitada a la bbdd
        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            
            $nuevoUsuario=new self();
            $nuevoUsuario->setIdUsuario($row['idUsuario']);
            $nuevoUsuario->setUsuario($row['usuario']);
            $nuevoUsuario->setContrasena($row['contrasena']);
            $nuevoUsuario->setNombre($row['nombre']);
            $nuevoUsuario->setApellido($row['apellido']);
            $nuevoUsuario->setTelefono($row['telefono']);
            $nuevoUsuario->setDni($row['dni']);
            $nuevoUsuario->setTipo($row['tipo']);
            
            
            //             $user=new userModel(); //para llamar a la función de libro_model
            
            //             $nuevoVehiculo->listaVehiculos=$user->findEditorialBooks($row['idEditorial']);
            //             // honek itzultzen digu editorial bateko liburu guztien zerrenda
            
            array_push($this->list, $row);
        }
        mysqli_free_result($result);
        //         unset($listaLibrosEditorial);
        $this->CloseConnect();
    }
  
    
    public function setUsuarioLogin(){
        
        $this->OpenConnect();
        
        $usuario="'".$this->getUsuario()."'";
        $password="'".$this->getContrasena()."'";
        //echo $usuario." ".$password;
        $sql = "CALL spComprobarUser($usuario,$password)";
        $row;
        $resultado = $this->link->query($sql); // result-en ddbb-ari eskatutako informazio dena gordetzen da
        //print_r($resultado);
//         // se guarda en result toda la información solicitada a la bbdd
        if ( $this->link->affected_rows >=1) // delete egiten da
        {
            $row = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
                
            $Usuario=new self();
            $Usuario->setIdUsuario($row['idUsuario']);
            $Usuario->setUsuario($row['usuario']);
            $Usuario->setContrasena($row['contrasena']);
            $Usuario->setNombre($row['nombre']);
            $Usuario->setApellido($row['apellido']);
            $Usuario->setTelefono($row['telefono']);
            $Usuario->setDni($row['dni']);
            $Usuario->setTipo($row['tipo']);
            
            
            array_push($this->usuarioLogin, $row);
            
            mysqli_free_result($resultado);
            
            
            $this->CloseConnect();
//             return $Usuario;
            return $row;
        } else {
            return "Fall� la borrada del libro: (" . $this->link->errno . ") " . $this->link->error;
        }
       
        } 
        public function setUsuarioRegister(){
            
            $this->OpenConnect();
            
            $usuario="'".$this->getUsuario()."'";
            
            $sql = "CALL spComprobarNickname($usuario)";
            $row;
            $resultado = $this->link->query($sql); // result-en ddbb-ari eskatutako informazio dena gordetzen da
            //print_r($resultado);
            //         // se guarda en result toda la información solicitada a la bbdd
            if ( $this->link->affected_rows >=1) // delete egiten da
            {
                $row = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
                
                $Usuario=new self();
                $Usuario->setIdUsuario($row['idUsuario']);
                $Usuario->setUsuario($row['usuario']);
                $Usuario->setContrasena($row['contrasena']);
                $Usuario->setNombre($row['nombre']);
                $Usuario->setApellido($row['apellido']);
                $Usuario->setTelefono($row['telefono']);
                $Usuario->setDni($row['dni']);
                $Usuario->setTipo($row['tipo']);
                
                
                array_push($this->usuarioRegister, $row);
                
                mysqli_free_result($resultado);
                
                
                $this->CloseConnect();
                //             return $Usuario;
                return $row;
            } else {
                return "Fall� la borrado del libro: (" . $this->link->errno . ") " . $this->link->error;
            }
            
                return "Fall� la borrado del libro: (" . $this->link->errno . ") " . $this->link->error;
            }
            

    public function delete()
    {
        $this->OpenConnect();
        
        $id=$this->getIdUsuario();
        
        
        $sql = "CALL spDeleteUsuario($id)";
        
        if ($this->link->query($sql)>=1) // delete egiten da
        {
            return "El usuario se ha borrado con exito";
        } else {
            return "Fall� la borrado del libro: (" . $this->link->errno . ") " . $this->link->error;
        }
        
        $this->CloseConnect();
    }
    
    public function insert()
    {
        $this->OpenConnect();
        
        $usuario=$this->getUsuario();
        $contrasena=$this->getContrasena();
        $nombre=$this->getNombre();
        $apellido=$this->getApellido();
        $telefono=$this->getTelefono();
        $dni= $this->getDni();
        $tipo= $this->getTipo();
        
        $sql = "CALL spInsertUsuario('$usuario', '$contrasena', '$nombre', '$apellido', '$telefono', '$dni', $tipo)";
        //$sql = "CALL spInsert('nuevo', 'ssss', 55)";
        
        if ($this->link->query($sql)>=1) // insert egiten da
        {
            return "El usuario se ha insertado con exito";
        } else {
            return "Fall� la insercion del usuario: (" . $this->link->errno . ") " . $this->link->error;
        }
        
        $this->CloseConnect();
    }
    
    public function update()
    {
        $this->OpenConnect();
        
        $id=$this->getIdUsuario();
        $usuario=$this->getUsuario();
        $contrasena=$this->getContrasena();
        $nombre=$this->getNombre();
        $apellido=$this->getApellido();
        $telefono=$this->getTelefono();
        $dni= $this->getDni();
        $tipo= $this->getTipo();
        
        $sql = "CALL spUpdateUsuario('$id','$usuario', '$contrasena', '$nombre', '$apellido', '$telefono', '$dni', $tipo)";
        if ($this->link->query($sql)>=1) // aldatu egiten da
        {
            echo "El USUARIO se ha modificado con exito";
        } else {
            echo "Fall� la modificacion del libro: (" . $this->link->errno . ") " . $this->link->error;
        }
        
        $this->CloseConnect();
    }
}
?>