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
        <style>
            div.table 
            {
                display:table;
            }
            form.tr, div.tr
            {
                display:table-row;
            }
            span.td
            {
                display:table-cell;
            }
        </style>
        <link rel="stylesheet" href="../files/bootstrap-4.3.1-dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/micss.css"/>
        <script>
            function cambiarColor(n) {
                var valor = "boton" + n;
                var valor2 = "Rol" + n;
                var boton = document.getElementById(valor).value;
                if (boton == "Usuario") {
                    document.getElementById(valor).value = "Administrador";
                    document.getElementById(valor2).value = "Administrador";
                    document.getElementById(valor).style.background = "#00FF00";
                } else {
                    document.getElementById(valor).value = "Usuario";
                    document.getElementById(valor2).value = "Usuario";
                    document.getElementById(valor).style.background = "#FF0000";
                }

            }
        </script>
    </head>
    <body>
        <?php
        require_once '../clases/Usuario.php';
        session_start();
        $_SESSION['lugar'] = 'otra';
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
                                <li class="nav-item active dropdown">
                                    <button class="btn nav-link dropdown-toggle" data-toggle="dropdown">Area Juego</button>
                                    <div class="dropdown-menu">
                                        <form class="dropdown-item" action="../controladores/Controlador.php" method="post">
                                            <input class="btn" type="submit" name="AddJuegoPagina" value="Añadir Juegos">
                                        </form>
                                        <?php if ($usuario->getRol() == 1) { ?>
                                            <form class="dropdown-item" action="../controladores/Controlador.php" method="post">
                                                <input class="btn" type="submit" name="ValidarJuegoPagina" value="Validar Juegos">
                                            </form>
                                            <form class="dropdown-item" action="../controladores/Controlador.php" method="post">
                                                <input class="btn" type="submit" name="ModUsuarioPagina" value="Listar Usuarios">
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
        <?php $usuarios = $_SESSION['usuarios']; ?>
        <div class="container">
            <div class="breadcrumb">
                <a class="breadcrumb-item" href="../index.php">Inicio</a>
                <a class="breadcrumb-item" href="#">Admin Usuarios</a>
            </div>
            <div class="table">
                <div class="tr">
                    <span class="td">DNI</span>
                    <span class="td">Correo</span>
                    <span class="td">Nombre</span>
                    <span class="td">Rol</span>
                </div>
                <?php for ($index = 0; $index < count($usuarios); $index++) {
                    ?>
                    <form class="tr" name="formulario" action="../controladores/ControladorAdmin.php" method="post">
                        <span class="td"><input type="text"  name="DNI" value="<?php echo $usuarios[$index]->getDni(); ?>" readonly></span>
                        <span class="td"><input type="text"  name="Correo" value="<?php echo $usuarios[$index]->getCorreo(); ?>" readonly></span>
                        <span class="td"><input type="text"  name="Nombre" value="<?php echo $usuarios[$index]->getNombre(); ?>" required></span>
                        <?php if ($usuarios[$index]->getRol() == 0) { ?>
                            <span class="td"><input type="button" id="boton<?php echo $index ?>" name="Usuario" value="Usuario" style="background-color: red" onclick="cambiarColor(<?php echo $index ?>)"></span>
                            <input type="hidden" id="Rol<?php echo $index ?>" name="Rol" value="Usuario">
                            <?php
                        } else {
                            ?>
                            <span class="td"><input type="button" id="boton<?php echo $index ?>" name="Administrador" value="Administrador" style="background-color: #00FF00" onclick="cambiarColor(<?php echo $index ?>)"></span>
                            <input type="hidden" id="Rol<?php echo $index ?>" name="Rol" value="Administrador">
                            <?php
                        }
                        ?> 
                        <span class="td"><input type="submit" name="ModificarUsuario" value="Modificar"/></span>
                        <span class="td"><input type="submit" name="EliminarUsuario" value="Eliminar"/></span>
                    </form>
                <?php } ?>
            </div>
        </div>
        <footer>
            <?php include_once '../footer.php'; ?>
        </footer>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="../files/bootstrap-4.3.1-dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>