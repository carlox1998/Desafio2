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
        <link rel="stylesheet" href="../files/bootstrap-4.3.1-dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/micss.css"/>
    </head>
    <body>
        <?php
        require_once '../clases/Juego.php';
        require_once '../clases/Usuario.php';
        session_start();
        ?>
        <div class="container-fluid color">
            <?php include_once '../header.php'; ?>
            <div class="row tam">
                <nav class="navbar tam navbar-expand-sm navbar-dark bg-dark">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="menu">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="../index.php" class="nav-link">Inicio</a>
                            </li>
                            <li class="nav-item dropdown">
                                <button class="btn nav-link dropdown-toggle" data-toggle="dropdown">Noticias</button>
                                <div class="dropdown-menu">
                                    <form class="dropdown-item" action="../controladores/Controlador.php" method="post">
                                        <input class="btn" type="submit" name="UltimaNoticia" value="Ultimas Noticias">
                                    </form>
                                    <form class="dropdown-item" action="../controladores/Controlador.php" method="post">
                                        <input class="btn" type="submit" name="NoticiaDestacada" value="Noticias Destacadas">
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item active dropdown">
                                <button class="btn nav-link dropdown-toggle" data-toggle="dropdown">Listar Juegos</button>
                                <div class="dropdown-menu">
                                    <form class="dropdown-item" action="../controladores/Controlador.php" method="post">
                                        <input class="btn" type="submit" name="ListarNombrePagina" value="Listar por Nombre">
                                    </form>
                                    <form class="dropdown-item" action="../controladores/Controlador.php" method="post">
                                        <input class="btn" type="submit" name="ListarTematicaPagina" value="Listar por Tematica">
                                    </form>
                                </div>
                            </li>
                            <?php
                            if (isset($_SESSION['usuario'])) {
                                $usuario = $_SESSION['usuario'];
                                ?>
                                <li class="nav-item dropdown">
                                    <button class="btn nav-link dropdown-toggle" data-toggle="dropdown">Area Juego</button>
                                    <div class="dropdown-menu">
                                        <form class="dropdown-item" action="../controladores/Controlador.php" method="post">
                                            <input class="btn" type="submit" name="AddJuegoPagina" value="Añadir Juegos">
                                        </form>
                                        <?php if ($usuario->getRol() == 1) { ?>
                                            <form class="dropdown-item" action="../controladores/Controlador.php" method="post">
                                                <input class="btn" type="submit" name="ValidarJuegoPagina" value="Validar Juegos">
                                            </form>
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
                        <a class="breadcrumb-item" href="../index.php">Inicio</a>
                        <a class="breadcrumb-item" href="#">Listar Juego</a>
                        <a class="breadcrumb-item" href="#">Listar Juego <?php
                            if (isset($_SESSION['juegosNombre'])) {
                                echo'Nombre';
                            } else {
                                echo'Tematica';
                            }
                            ?>
                        </a>
                    </div>
                </nav>
                <div class="container">
                    <form action="../controladores/Controlador.php" method="post">
                        <input type="submit" class="btn-link btn tambtn" value="A" name="ListarNombrePagina">
                        <input type="submit" class="btn-link btn tambtn" value="B" name="ListarNombrePagina">
                        <input type="submit" class="btn-link btn tambtn" value="C" name="ListarNombrePagina">
                        <input type="submit" class="btn-link btn tambtn" value="D" name="ListarNombrePagina">
                        <input type="submit" class="btn-link btn tambtn" value="E" name="ListarNombrePagina">
                        <input type="submit" class="btn-link btn tambtn" value="F" name="ListarNombrePagina">
                        <input type="submit" class="btn-link btn tambtn" value="G" name="ListarNombrePagina">
                        <input type="submit" class="btn-link btn tambtn" value="H" name="ListarNombrePagina">
                        <input type="submit" class="btn-link btn tambtn" value="I" name="ListarNombrePagina">
                        <input type="submit" class="btn-link btn tambtn" value="J" name="ListarNombrePagina">
                        <input type="submit" class="btn-link btn tambtn" value="K" name="ListarNombrePagina">
                        <input type="submit" class="btn-link btn tambtn" value="L" name="ListarNombrePagina">
                        <input type="submit" class="btn-link btn tambtn" value="M" name="ListarNombrePagina">
                        <input type="submit" class="btn-link btn tambtn" value="N" name="ListarNombrePagina">
                        <input type="submit" class="btn-link btn tambtn" value="O" name="ListarNombrePagina">
                        <input type="submit" class="btn-link btn tambtn" value="P" name="ListarNombrePagina">
                        <input type="submit" class="btn-link btn tambtn" value="Q" name="ListarNombrePagina">
                        <input type="submit" class="btn-link btn tambtn" value="R" name="ListarNombrePagina">
                        <input type="submit" class="btn-link btn tambtn" value="S" name="ListarNombrePagina">
                        <input type="submit" class="btn-link btn tambtn" value="T" name="ListarNombrePagina">
                        <input type="submit" class="btn-link btn tambtn" value="U" name="ListarNombrePagina">
                        <input type="submit" class="btn-link btn tambtn" value="V" name="ListarNombrePagina">
                        <input type="submit" class="btn-link btn tambtn" value="W" name="ListarNombrePagina">
                        <input type="submit" class="btn-link btn tambtn" value="X" name="ListarNombrePagina">
                        <input type="submit" class="btn-link btn tambtn" value="Y" name="ListarNombrePagina">
                        <input type="submit" class="btn-link btn tambtn" value="Z" name="ListarNombrePagina">
                    </form>
                </div>
                <?php
                if (isset($_SESSION['juegosNombre'])) {
                    if (!$_SESSION['juegosNombre']) {
                        ?>
                        <p>Results Not Found</p>
                        <?php
                    } else {
                        $juegos = $_SESSION['juegosNombre'];
                        ?>
                        <table>
                            <thead>
                                <tr>
                                    <td>Foto</td>
                                    <td>Nombre</td>
                                    <td>Edad Minima</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for ($index = 0; $index < count($juegos); $index++) {
                                    ?>
                                    <tr>
                                        <td><img class="modimagen" src="<?php $juegos[$index]->getFoto(); ?>" alt="foto"></td>
                                        <td><?php echo $juegos[$index]->getNombre(); ?></td>
                                        <td><?php echo $juegos[$index]->getE_Minima(); ?></td>
                                        <td>Boton de ventana con mas contenido</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <?php
                    }
                } else {
                    if (strcmp($_SESSION['juegosTematica'], 'null') == 0) {
                        ?>
                        <p>Results Not Found</p>
                        <?php
                    } else {
                        $juegos = $_SESSION['juegosTematica'];
                        ?>
                        <table>
                            <thead>
                                <tr>
                                    <td>Foto</td>
                                    <td>Nombre</td>
                                    <td>Edad Minima</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for ($index = 0; $index < count($juegos); $index++) {
                                    ?>
                                    <tr>
                                        <td><img src=<?php echo $_SERVER['DOCUMENT_ROOT'] . '/TemaPHP/intranet/uploads/'.$juegos[$index]->getFoto(); ?> alt=""></td>
                                        <td><?php echo $juegos[$index]->getNombre(); ?></td>
                                        <td><?php echo $juegos[$index]->getE_Minima(); ?></td>
                                        <td>Boton de ventana con mas contenido</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <?php
                    }
                }
                ?>
            </main>            
        </div>
        <div id="registrar" class="modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title">
                            Título
                        </div>            
                    </div>
                    <div class="modal-body">
                        <form name="formulario" action="../controladores/Controlador.php" method="post">
                            <label for="dni">DNI</label>
                            <input id="dni" name="dni" type="text" required>
                            <label for="correo">Correo</label>
                            <input id="correo" name="correo" type="text" required>
                            <label for="nombre">Nombre</label>
                            <input id="nombre" name="nombre" type="text" required>
                            <label for="contra">Password</label>
                            <input id="contra" name="contra" type="password">
                            <label for="contra2">Repite Password</label>
                            <input id="contra2" name="contra2" type="password">
                            <input type="submit" name="registrarse" id="registrarse" value="Aceptar">
                        </form>
                    </div>
                    <div class="modal-footer">
                        Pie de la ventana modal
                    </div>
                </div>
            </div>
        </div>

        <div id="login" class="modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title">
                            <div class="alert alert-primary alert-dismissible show fade">
                                Login:
                                <button type="button" class="close" data-dismiss="modal">X</button>
                            </div>
                        </div>            
                    </div>
                    <div class="modal-body">
                        <form name="formulario" action="../controladores/Controlador.php" method="post">
                            <label for="usuario">Usuario</label>
                            <input id="usuario" name="usuario" type="text" required>
                            <label for="clave">Password</label>
                            <input id="clave" name="clave" type="password">
                            <input type="submit" name="validar" id="validar" value="Aceptar">
                        </form>
                    </div>
                    <div class="modal-footer">
                        Pie de la ventana modal
                    </div>
                </div>
            </div>
        </div>
        <footer class="color">
            <?php include_once '../footer.php'; ?>
        </footer>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="../files/bootstrap-4.3.1-dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
