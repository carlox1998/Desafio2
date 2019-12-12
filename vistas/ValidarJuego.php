<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
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
        include_once '../clases/Usuario.php';
        include_once '../clases/Juego.php';
        session_start();
        $_SESSION['lugar'] = 'ValidarJuego';
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
                            <li class="nav-item dropdown">
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
                        <a class="breadcrumb-item" href="#">Validar Juegos</a>
                    </div>
                </nav>
                <?php
                $juegos = $_SESSION['juegosValidar'];
                $tematicas = $_SESSION['Tematica'];
                ?>
                <div class="container-fluid">
                    <div class="table">
                        <div class="tr">
                            <span class="td">Foto</span>
                            <span class="td">Nombre</span>
                            <span class="td">Descripcion</span>
                            <span class="td">Plataforma</span>
                            <span class="td">Fecha de salida</span>
                            <span class="td">Edad Minima</span>
                            <span class="td"></span>
                            <span class="td"></span>
                        </div>
                        <?php for ($index = 0; $index < count($juegos); $index++) {
                            ?>
                            <form class="tr" name="formulario" action="../controladores/ControladorAdmin.php" method="post">
                                <span class="td"><img class="modimagen" src="data:<?php echo $juegos[$index]->getTipo() ?>;base64,<?php echo base64_encode($juegos[$index]->getFoto()); ?>" alt="foto"></span>
                                <span class="td"><input type="text"  name="Nombre" value="<?php echo $juegos[$index]->getNombre(); ?>" readonly></span>
                                <span class="td"><input type="text"  name="Descripcion" value="<?php echo $juegos[$index]->getDescripcion(); ?>" required></span>
                                <span class="td"><input type="text"  name="Plataforma" value="<?php echo $juegos[$index]->getPlataforma(); ?>" readonly></span>
                                <span class="td"><input type="text"  name="FSalida" value="<?php echo $juegos[$index]->getF_Salida(); ?>" readonly></span>
                                <span class="td"><input type="text"  name="EMinima" value="<?php echo $juegos[$index]->getE_Minima(); ?>" readonly></span>
                                <span class="td"><input type="submit" name="AddJuego" value="Añadir"/></span>
                                <span class="td"><input type="submit" name="EliminarJuego" value="Eliminar"/></span>
                            </form>
                            <form class="td" name="formulario" action="../controladores/ControladorAdmin.php" method="post">
                                <input type="hidden"  name="Nombre" value="<?php echo $juegos[$index]->getNombre(); ?>" readonly>                                
                                <select name="Tematica" required>
                                    <?php for ($index1 = 0; $index1 < count($tematicas); $index1++) { ?>
                                        <option  name=tematica value="<?php echo $index1 + 1 ?>"><?php echo $tematicas[$index1] ?></option>
    <?php } ?>
                                </select>                                
                                <span class="td"><input type="submit" name="AddTematica" value="Añadir Tematica"/></span>
                            </form>
<?php } ?>
                    </div>
                </div>
            </main>            
        </div>
        <audio src="../multimedia/musica.mp3" loop hidden autoplay id='A001'></audio>
        <footer>
<?php include_once '../footer.php'; ?>
        </footer>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="../files/bootstrap-4.3.1-dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
