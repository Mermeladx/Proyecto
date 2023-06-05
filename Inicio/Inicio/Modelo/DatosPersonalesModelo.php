<?php
require_once "Conexiones/ConexionBD.php";
class DatosPersonalesModelo{
    private $conexion,
            $status,
            $mensaje,  
            $lugarDeError,
            $datos,

            $clave,  
            $obtenerpor,
            $NoControl,
            $Nombre,
            $ApellidoPaterno,
            $ApellidoMaterno;
    
    public function __CONSTRUCT()
    {
        try{
            $this->conexion = Conexion::IniciarConexion();
            $this->status = TRUE;
        }catch (Exception $e){
            $this->status = FALSE;
            $this->mensaje = 'Error al conectarse a la BD: '. $this->lugarDeError. 'codigo';
        }
        $this->lugarDeError='';
    }
    public function setStatus($status){$this->clave = $status;}
    public function getStatus(){return $this->status;}

    public function setMensaje($mensaje){$this->clave = $mensaje;}
    public function getMensaje(){return $this->mensaje;}

    public function setLugarDeError($lugarDeError){$this->clave = $lugarDeError;}
    public function getLugarDeError(){return $this->lugarDeError;}


    public function setId ($NoControl){$this->NoControl = $NoControl;}
    public function getId(){return $this->NoControl;} 

    public function setNombre ($Nombre){$this->Nombre = $Nombre;}
    public function getNombre(){return $this->Nombre;}

    public function setApellidoP ($ApelloidoPaterno){$this->ApellidoPaterno = $ApelloidoPaterno;}
    public function getApellidoP(){return $this->ApellidoPaterno;}

    public function setApellidoM ($ApellidoMaterno){$this->ApellidoMaterno = $ApellidoMaterno;}
    public function getApellidoM(){return $this->ApellidoMaterno;}
    
    public function obtenerDatos()
    {
        $this-> datos = (object) array('Alumnos' => NULL);
        try{
            $sql = "SELECT * FROM Alumnos";
            $consulta = $this->conexion->prepare($sql);
            $consulta->execute();
            $errores = $consulta->errorInfo();
            if ($errores[0]== 0000)
            {
                $this->status = TRUE;
                $this->datos = $consulta->fetchAll(PDO::FETCH_OBJ);
            }else{
                throw new Exception($errores[2]);
            }
        }
        catch (PDOException $e){
            $this->status = FALSE;
            $this->mensaje= 'Error al obtener la informacion: '. $this->lugarDeError. 'codigo'. $e->getCode() . 'Modelo linea'. $e->getLine();
        }
        catch (Exception $e)
        {
            $this->status=FALSE;
            $this->mensaje=$e->getMessage();
        }
        return $this->datos;
    }
} 