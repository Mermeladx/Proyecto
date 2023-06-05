<?php
include_once "Crud/Crud/Vista/VistaFormulario.php";
include_once "Crud/Crud/Modelo/DatosPersonalesModelo.php";
include_once "clases/pagina.php";

class CrudControlador
{
    private $modelo;
    private $pagina;
    private $datos;

    public function __construct()
    {
        $this->modelo = new DatosPersonalesModelo();
        $this->pagina = new pagina("Mi pagina");
    }

    public function index()
    {
        $this->pagina->inicializaEncabezado("clases/html/encabezadoExterno.php");
        $vista = new Formulario();
        $vista->template();

        // Obtener el tipo de formulario
        if (isset($_GET['tipo'])) {
            $tipo = $_GET['tipo'];
            // Ejecutar la acción correspondiente según el tipo de formulario
            switch ($tipo) {
                case 'crear':
                    $this->Insertar();
                    break;
                case 'actualizar':
                    $this->Actualizar();
                    break;
                case 'eliminar':
                    $this->Eliminar();
                    break;
                default:
                    $this->index();
                    break;
            }
        }
    }
    public function Insertar()
    {
        $numeroControl = $_POST['numeroControl'];
        $nombre = $_POST['nombre'];
        $apellidoPaterno = $_POST['apellidoPaterno'];
        $apellidoMaterno = $_POST['apellidoMaterno'];
        $this->modelo->insertarDatos($numeroControl, $nombre, $apellidoPaterno, $apellidoMaterno);
        echo "EL alumno " . $nombre . " fue agregado correctamente";
    }

    public function Actualizar()
    {
        $numeroControl = $_POST['numeroControl'];
        $nombre = $_POST['nombre'];
        $apellidoPaterno = $_POST['apellidoPaterno'];
        $apellidoMaterno = $_POST['apellidoMaterno'];
        $this->modelo->actualizarDatos($numeroControl, $nombre, $apellidoPaterno, $apellidoMaterno);
        echo "EL alumno " . $nombre . " fue actualizado correctamente";
    }

    public function Eliminar()
    {
        $numeroControl = $_POST['numeroControl'];
        $this->modelo->eliminarDatos($numeroControl);
        echo "EL alumno " . $numeroControl . " fue eliminado correctamente";
    }
}
?>