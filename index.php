<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Desafio</title>
        <link rel="stylesheet" href="files/bootstrap-4.3.1-dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/micss.css"/>
    </head>
    <body>
        <?php
        ?>
        <div class="container-fluid">
            <div class="row tam">
                <div class="col">
                    <div class="media">
                        <img src="imagen/cosa2.jpg" width="60px" height="60px" class="icon"/>
                    </div>
                </div>
                <?php if (!isset($_SESSION['Usuario'])) { ?>
                    <div class="col">
                        <div class="row tam justify-content-end align-items-center">
                            <form class="form-inline">
                                <input class="btn btn-primary btn-sm mr-2" data-toggle="modal" data-target="#entrar" type="button" value="Login">
                                <input class="btn btn-primary btn-sm" data-toggle="modal" data-target="#registro" type="button" value="Registro">
                            </form>
                        </div>
                    </div>
                <?php } else {
                    ?>
                    <div class="col">
                        <div class="row tam justify-content-end align-items-center">
                            <form action="controladores/Controlador.php" method="post">
                                <input type="submit" value="Cerrar Sesion" name="CerrarSesion">
                            </form>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="row tam">
                <nav class="navbar tam navbar-expand-sm navbar-dark bg-dark">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="menu">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a href="#" class="nav-link">Inicio</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown">Noticias</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Últimas noticias</a>
                                    <a class="dropdown-item" href="#">Noticias Destacadas</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown">Listar Juegos</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Listar por Nombre</a>
                                    <a class="dropdown-item" href="#">Listar por Tematica</a>
                                </div>
                            </li>
                            <?php
                            if (isset($_SESSION['usuario'])) {
                                $usuario = $_SESSION['usuario'];
                                ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown">Contacto</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Añadir Juegos</a>
                                        <?php if ($usuario->getRol() == 2) { ?>
                                            <a class="dropdown-item" href="#">Validar Juegos</a>
                                        <?php } ?>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>






        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="files/bootstrap-4.3.1-dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
