<?php
class EncabezadoExterno
{
  function template($tituloPagina)
  {


    ?>
    <!doctype html>
    <html lang="es">

    <head>
      <title>
        <?php echo $tituloPagina; ?>
      </title>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="clases/html/css/bootstrap.css" />
      <link rel="stylesheet" href="clases/html/css/bootstrap.min.css" />
      <link rel="stylesheet" href="clases/html/css/styleMenu.css">
      <head>
        <!-- Optional JavaScript -->
        <script src="clases/html/js/jquery-3.7.0.min.js"></script>
        <script src="clases/html/js/popper.min.js"></script>
        <script src="clases/html/js/bootstrap.js"></script>
        <script src="clases/html/js/bootstrap.min.js"></script>
        <script src="clases/html/js/menu.js"></script>
      </head>

    <body>
      <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="?modulo=Inicio&controlador=Inicio&accion=index">Inicio</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">Contacto</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?modulo=Crud&controlador=Crud&accion=index">CRUD</a>
              </li>
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="text" placeholder="Search">
              <button class="btn btn-primary" type="button">Buscar</button>
            </form>
          </div>
        </div>
      </nav>

      
      <?php
  }

}
?>