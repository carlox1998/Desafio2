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
        <script>
            $(document).ready(function () {
                document.getElementById("registrarse").disabled = true;

                $("#contra2").blur(function () {
                    var contra = $("#contra").val();
                    var contra2 = $("#contra2").val();
                    if (contra != contra2) {
                        $("#contra2").css("background-color", "#FF0000");
                        $("#registrarse").attr('disabled', true);
                    } else {
                        $("#registrarse").attr('disabled', false);
                        $("#contra2").css("background-color", "#FFFFFF");
                    }
                });
            });
            
            function reproducir() {
                var oAudio = document.getElementById('A001');
                var audioURL = document.getElementById('A001').src;
                if (localStorage.getItem("tiempo") !== 'null') {
                    var ruta = "multimedia/musica.mp3#t=" + localStorage.getItem("tiempo");
                } else {
                    var ruta = "multimedia/musica.mp3";
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
        require_once './clases/Usuario.php';
        session_start();
        $_SESSION['lugar'] = 'index';
        ?>
        <div class="container-fluid color">
            <?php include_once 'header.php'; ?>
            <div class="row tam">
                <nav class="navbar tam navbar-expand-sm navbar-dark bg-dark">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="menu">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a href="index.php" class="nav-link">Inicio</a>
                            </li>
                            <li class="nav-item dropdown">
                                <button class="btn nav-link dropdown-toggle" data-toggle="dropdown">Noticias</button>
                                <div class="dropdown-menu">
                                    <form class="dropdown-item" action="controladores/Controlador.php" method="post">
                                        <input class="btn" type="submit" name="UltimaNoticia" value="Ultimas Noticias">
                                    </form>
                                    <form class="dropdown-item" action="controladores/Controlador.php" method="post">
                                        <input class="btn" type="submit" name="NoticiaDestacada" value="Noticias Destacadas">
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <button class="btn nav-link dropdown-toggle" data-toggle="dropdown">Listar Juegos</button>
                                <div class="dropdown-menu">
                                    <form class="dropdown-item" action="controladores/Controlador.php" method="post">
                                        <input class="btn" type="submit" name="ListarNombrePagina" value="Listar por Nombre">
                                    </form>
                                    <form class="dropdown-item" action="controladores/Controlador.php" method="post">
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
                                        <form class="dropdown-item" action="controladores/Controlador.php" method="post">
                                            <input class="btn" type="submit" name="AddJuegoPagina" value="Añadir Juegos">
                                        </form>
                                        <?php if ($usuario->getRol() == 1) { ?>
                                            <form class="dropdown-item" action="controladores/Controlador.php" method="post">
                                                <input class="btn" type="submit" name="ValidarJuegoPagina" value="Validar Juegos">
                                            </form>                                        
                                        <?php } ?>
                                    </div>
                                </li>
                                <?php if ($usuario->getRol() == 1) { ?>
                                    <li class="nav-item dropdown">
                                        <button class="btn nav-link dropdown-toggle" data-toggle="dropdown">Administrar Usuarios</button>
                                        <div class="dropdown-menu">
                                            <form class="dropdown-item" action="controladores/Controlador.php" method="post">
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
                        <a class="breadcrumb-item" href="index.php">Inicio</a>
                    </div>
                </nav>

                <div class="btn tam justify-item-center" data-toggle="tooltip" title="Games Or Death." data-placement="left" data-html="true">
                    <h1>GOD</h1>
                </div>
                <p>Bienvenidos a <abbr title="Games Or Death.">GOD</abbr> un lugar dedicado a VideoJuegos tanto antiguos como las nuevos incorporaciones a este sector.</p>
                <p>En esta pagina podreis ver los distintos tipos de juegos que habia hace unos años con los que seguramente no estes familiarizados o ver las ultimas incorporaciones de estos.</p>
                <p>En la parte de noticias podreis ver las nuevas noticias que hay sobre los nuevos juegos que vayan saliendo, o puedes ver las noticias destacadas desde antiguos hasta los de ahora.</p>
                <p>Tambien podreis pedir que añadamos un juego que falte en nuestra pagina ya sea antiguo o nuevo.Siempre y cuando estes registrado a nuestra web.</p>
            </main>            
        </div>
        
        <audio src="multimedia/musica.mp3" hidden loop autoplay id='A001'></audio>
        
        <footer>
            <?php include_once 'footer.php'; ?>
        </footer>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="files/bootstrap-4.3.1-dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
