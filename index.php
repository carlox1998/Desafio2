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
        session_start();
        ?>
        <div class="container-fluid color">
            <?php include_once 'Auxiliar/header.php'; ?>
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
                                <button class="btn nav-link dropdown-toggle" data-toggle="dropdown">Noticias</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Últimas Noticias</a>
                                    <a class="dropdown-item" href="#">Noticias Destacadas</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <button class="btn nav-link dropdown-toggle" data-toggle="dropdown">Listar Juegos</button>
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
                                    <button class="btn nav-link dropdown-toggle" data-toggle="dropdown">Area Juego</button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Añadir Juegos</a>
                                        <?php if ($usuario->getRol() == 1) { ?>
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
        <div class="container">
            <main>
                <nav>
                    <div class="breadcrumb">
                        <a class="breadcrumb-item" href="index.php">Inicio</a>
                    </div>
                </nav>
                <div class="col">
                    <div class="media">
                        <img src="imagen/imagen.jpg" width="100%" height="360px" alt="logo" class="icon"/>
                    </div>
                </div>
                <h1>"Nombre de la pagina"</h1>
                <p>Bienvenidos a "Insertar nombre de la pagina" un lugar dedicado a Juegos antiguos que seguramente no habreis escuchado sobre ellos.</p>
                <p>En esta pagina podreis ver los distintos tipos de juegos que habia hace unos años con los que seguramente no estes familiarizados.Tambien podreis pedir que añadamos un juego que falte en nuestra pagina</p>
                <p>En la parte de noticias podreis ver las nuevas noticias que hay sobre los nuevos juegos que vayan saliendo, o puedes ver las noticias destacadas de los juegos antiguos.</p>
            </main>            
        </div>
        <footer class="color">
            <?php include_once 'Auxiliar/footer.php'; ?>
        </footer>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="files/bootstrap-4.3.1-dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
