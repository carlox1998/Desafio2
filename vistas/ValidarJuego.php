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
    </head>
    <body>
        <?php
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
                                <a href="index.php" class="nav-link">Inicio</a>
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
                        <a class="breadcrumb-item" href="index.php">Inicio</a>
                        <a class="breadcrumb-item" href="#">Validar Juegos</a>
                    </div>
                </nav>
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
        <footer>
            <?php include_once '../footer.php'; ?>
        </footer>
    </body>
</html>
