<?php
include_once "Inicio/Inicio/Vista/Vistainicio.php";
include_once "Inicio/Inicio/Modelo/DatosPersonalesModelo.php";
include_once "clases/pagina.php";
class InicioControlador{

    private $modelo,
            $pagina,
            $datos;

    public function __CONSTRUCT()
    {
        $this->pagina = new pagina("Mi pagina");
        $this->modelo = new DatosPersonalesModelo();
    }

    public function index(){
        $this->pagina->inicializaEncabezado("clases/html/encabezadoExterno.php");
       if ($this->modelo->getStatus()){
        $datos = $this->modelo->obtenerDatos();
        
        if ($this->modelo->getStatus()){
            $vista = new Inicio();
            $vista->template($datos);
        }else{
            echo $this->modelo->getMensaje();
        }
       }else{
        echo $this->modelo->getMensaje();
       }

       $this->pagina->inicializaPie("clases/html/pieExterno.php");
    }
}

?>