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
                size: 50px;
            }
        </style>
    </head>
    <body>
        <?php
        include_once '../clases/Usuario.php';
        include_once '../clases/Juego.php';
        session_start();
        $_SESSION['lugar']='otra';
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
                                <span class="td"><input type="text"  name="Foto" value="<?php //echo $juegos[$index]->getFoto(); ?>" readonly></span>
                                <span class="td"><input type="text"  name="Nombre" value="<?php echo $juegos[$index]->getNombre(); ?>" readonly></span>
                                <span class="td"><input type="text"  name="Descripcion" value="<?php echo $juegos[$index]->getDescripcion(); ?>" required></span>
                                <span class="td"><input type="text"  name="Plataforma" value="<?php echo $juegos[$index]->getPlataforma(); ?>" readonly></span>
                                <span class="td"><input type="text"  name="FSalida" value="<?php echo $juegos[$index]->getF_Salida(); ?>" readonly></span>
                                <span class="td"><input type="text"  name="EMinima" value="<?php echo $juegos[$index]->getE_Minima(); ?>" readonly></span>
                                <span class="td"><input type="submit" name="ModificarUsuario" value="Añadir"/></span>
                                <span class="td"><input type="submit" name="EliminarUsuario" value="Eliminar"/></span>
                            </form>
                            <form class="td" name="formulario" action="../controladores/ControladorAdmin.php" method="post">                                
                                <select name="Tematica" required>
                                    <?php for ($index = 0; $index < count($tematicas); $index++) { ?>
                                        <option  name=tematica value=<?php echo $tematicas[$index] ?>><?php echo $tematicas[$index] ?></option>
                                        <?php } ?>
                                    </select>                                
                                    <span class="td"><input type="submit" name="AddTematica" value="Añadir Tematica"/></span>
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                </main>            
            </div>
            <!-- <div id="registrar" class="modal">
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
             </div>-->
            <footer>
                <?php include_once '../footer.php'; ?>
        </footer>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="../files/bootstrap-4.3.1-dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
