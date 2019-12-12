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
        <script>
            function reproducir() {
                var oAudio = document.getElementById('A001');
                var audioURL = document.getElementById('A001').src;
                if (localStorage.getItem("tiempo") !== 'null') {
                    var ruta = "../multimedia/musica.mp3#t=" + localStorage.getItem("tiempo");
                } else {
                    var ruta = "../multimedia/musica.mp3";
                }
                //audioURL.value = "multimedia/musica.mp3#t=" + localStorage.getItem("tiempo");
                //alert(audioURL.value);
                oAudio.src = ruta;
            }

            function tenertiempo() {
                var oAudio = document.getElementById('A001');
                localStorage.setItem("tiempo", oAudio.currentTime);
            }
        </script>
    </head>
    <body onload="reproducir()" onunload="tenertiempo()">
        <?php
        require_once '../clases/Juego.php';
        require_once '../clases/Usuario.php';
        session_start();
        $_SESSION['lugar'] = 'ListarJuegos';
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
                                <?php if ($usuario->getRol() == 1) { ?>
                                    <li class="nav-item dropdown">
                                        <button class="btn nav-link dropdown-toggle" data-toggle="dropdown">Administrar Usuarios</button>
                                        <div class="dropdown-menu">
                                            <form class="dropdown-item" action="../controladores/Controlador.php" method="post">
                                                <input class="btn" type="submit" name="ModUsuarioPagina" value="Listar Usuarios">
                                            </form>
                                        </div>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
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
                <?php if (isset($_SESSION['juegosNombre'])) { ?>
                    <div class="container">
                        <form action="../controladores/Controlador.php" method="post">
                            <input type="submit" class="btn-link btn tambtn" value="A" name="ListarNombre">
                            <input type="submit" class="btn-link btn tambtn" value="B" name="ListarNombre">
                            <input type="submit" class="btn-link btn tambtn" value="C" name="ListarNombre">
                            <input type="submit" class="btn-link btn tambtn" value="D" name="ListarNombre">
                            <input type="submit" class="btn-link btn tambtn" value="E" name="ListarNombre">
                            <input type="submit" class="btn-link btn tambtn" value="F" name="ListarNombre">
                            <input type="submit" class="btn-link btn tambtn" value="G" name="ListarNombre">
                            <input type="submit" class="btn-link btn tambtn" value="H" name="ListarNombre">
                            <input type="submit" class="btn-link btn tambtn" value="I" name="ListarNombre">
                            <input type="submit" class="btn-link btn tambtn" value="J" name="ListarNombre">
                            <input type="submit" class="btn-link btn tambtn" value="K" name="ListarNombre">
                            <input type="submit" class="btn-link btn tambtn" value="L" name="ListarNombre">
                            <input type="submit" class="btn-link btn tambtn" value="M" name="ListarNombre">
                            <input type="submit" class="btn-link btn tambtn" value="N" name="ListarNombre">
                            <input type="submit" class="btn-link btn tambtn" value="O" name="ListarNombre">
                            <input type="submit" class="btn-link btn tambtn" value="P" name="ListarNombre">
                            <input type="submit" class="btn-link btn tambtn" value="Q" name="ListarNombre">
                            <input type="submit" class="btn-link btn tambtn" value="R" name="ListarNombre">
                            <input type="submit" class="btn-link btn tambtn" value="S" name="ListarNombre">
                            <input type="submit" class="btn-link btn tambtn" value="T" name="ListarNombre">
                            <input type="submit" class="btn-link btn tambtn" value="U" name="ListarNombre">
                            <input type="submit" class="btn-link btn tambtn" value="V" name="ListarNombre">
                            <input type="submit" class="btn-link btn tambtn" value="W" name="ListarNombre">
                            <input type="submit" class="btn-link btn tambtn" value="X" name="ListarNombre">
                            <input type="submit" class="btn-link btn tambtn" value="Y" name="ListarNombre">
                            <input type="submit" class="btn-link btn tambtn" value="Z" name="ListarNombre">
                        </form>
                    </div>
                    <?php
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
                                        <td><img class="modimagen" src="data:<?php echo $juegos[$index]->getTipo() ?>;base64,<?php echo base64_encode($juegos[$index]->getFoto()); ?>" alt="foto"></td>                                        
                                        <!--<td><img class="modimagen" src="<?php //$juegos[$index]->getFoto();       ?>" alt="foto"></td>-->
                                        <td><?php echo $juegos[$index]->getNombre(); ?></td>
                                        <td><?php echo $juegos[$index]->getE_Minima(); ?></td>
                                        <td><input class="btn btn-primary btn-sm mr-2" data-toggle="modal" data-target="#mostrar_extenso<?php echo $index ?>" type="button" value="Mostrar"></td>
                                    </tr>
                                <div id="mostrar_extenso<?php echo $index ?>" class="modal">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="modal-title">
                                                    <?php echo $juegos[$index]->getNombre(); ?>
                                                </div>            
                                            </div>
                                            <div class="modal-body">
                                                <img class="modimagen" src="data:<?php echo $juegos[$index]->getTipo() ?>;base64,<?php echo base64_encode($juegos[$index]->getFoto()); ?>" alt="foto">
                                                <p>Descripcion: <?php echo $juegos[$index]->getDescripcion(); ?></p>
                                                <p>Plataforma: <?php echo $juegos[$index]->getPlataforma(); ?></p>
                                                <p>Fecha Salida: <?php echo $juegos[$index]->getF_Salida(); ?></p>
                                                <p>Edad Minima: <?php echo $juegos[$index]->getE_Minima(); ?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="alert alert-primary alert-dismissible show fade">
                                                    Cerrar:
                                                    <button type="button" class="close align-items-end" data-dismiss="modal">X</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>
                            </tbody>
                        </table>
                        <?php
                    }
                } else {
                    ?>
                    <div class="container">
                        <form action="../controladores/Controlador.php" method="post">
                            <input type="submit" class="btn-link btn tambtn" value="Accion" name="ListarTematica">
                            <input type="submit" class="btn-link btn tambtn" value="Plataformas" name="ListarTematica">
                            <input type="submit" class="btn-link btn tambtn" value="Peleas" name="ListarTematicaPagina">
                            <input type="submit" class="btn-link btn tambtn" value="Realidad Virtual" name="ListarTematica">
                            <input type="submit" class="btn-link btn tambtn" value="Deportes" name="ListarTematica">
                            <input type="submit" class="btn-link btn tambtn" value="Carreras" name="ListarTematica">
                        </form>
                    </div>
                    <?php
                    if (!$_SESSION['juegosTematica']) {
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
                                        <td><img class="modimagen" src="data:<?php echo $juegos[$index]->getTipo() ?>;base64,<?php echo base64_encode($juegos[$index]->getFoto()); ?>" alt="foto"></td>
                                        <td><?php echo $juegos[$index]->getNombre(); ?></td>
                                        <td><?php echo $juegos[$index]->getE_Minima(); ?></td>
                                        <td><input class="btn btn-primary btn-sm mr-2" data-toggle="modal" data-target="#mostrar_extenso<?php echo $index ?>" type="button" value="Mostrar"></td>
                                    </tr>
                                <div id="mostrar_extenso<?php echo $index ?>" class="modal">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="modal-title">
                                                    <?php echo $juegos[$index]->getNombre(); ?>
                                                </div>            
                                            </div>
                                            <div class="modal-body">
                                                <img class="modimagen" src="data:<?php echo $juegos[$index]->getTipo() ?>;base64,<?php echo base64_encode($juegos[$index]->getFoto()); ?>" alt="foto">
                                                <p>Descripcion: <?php echo $juegos[$index]->getDescripcion(); ?></p>
                                                <p>Plataforma: <?php echo $juegos[$index]->getPlataforma(); ?></p>
                                                <p>Fecha Salida: <?php echo $juegos[$index]->getF_Salida(); ?></p>
                                                <p>Edad Minima: <?php echo $juegos[$index]->getE_Minima(); ?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="alert alert-primary alert-dismissible show fade">
                                                    Cerrar:
                                                    <button type="button" class="close align-items-end" data-dismiss="modal">X</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            </tbody>
                        </table>
                        <?php
                    }
                }
                ?>
            </main>            
        </div>
        <audio src="../multimedia/musica.mp3" loop hidden autoplay id='A001'></audio>
        
        <footer class="color">
            <?php include_once '../footer.php'; ?>
        </footer>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="../files/bootstrap-4.3.1-dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
