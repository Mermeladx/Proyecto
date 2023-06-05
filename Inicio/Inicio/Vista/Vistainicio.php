<head>
    <link rel="stylesheet" type="text/css" href="clases/html/css/paginado.css">
</head>
<?php
include_once "clases/pagina.php";
class Inicio
{
    public function template($datos)
    {

        // Número de datos por página
        $datosPorPagina = 2;

        // Página actual
        $paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

        // Calcular el número total de páginas
        $totalPaginas = ceil(count($datos) / $datosPorPagina);

        // Calcular el índice inicial y final de los datos a mostrar
        $indiceInicio = ($paginaActual - 1) * $datosPorPagina;
        $indiceFin = $indiceInicio + $datosPorPagina;

        // Obtener los datos a mostrar en la página actual
        $datosPagina = array_slice($datos, $indiceInicio, $datosPorPagina);

        // Mostrar los datos en la página actual
        echo "<h2>Datos:</h2>";
        foreach ($datosPagina as $dato) {
            echo "<p>ID: " . $dato->NoControl . "</p>";
            echo "<p>Nombre: " . $dato->Nombre . "</p>";
            echo "<p>Apellido Paterno: " . $dato->ApellidoPaterno . "</p>";
            echo "<p>Apellido Materno: " . $dato->ApellidoMaterno . "</p>";
            echo "<hr>";
        }

        // Mostrar el paginador con estilos CSS
        echo "<div class='paginador'>";
        for ($i = 1; $i <= $totalPaginas; $i++) {
            echo "<a class='pagina" . ($paginaActual == $i ? " activa" : "") . "' href='?modulo=Inicio&controlador=Inicio&accion=index&pagina=$i'>$i</a>";
        }
        echo "</div>";
    }

}

?>