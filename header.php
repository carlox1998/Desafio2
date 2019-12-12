<?php ?>

<div class="row tam">
    <div class="col">
        <div class="media">
            <?php
            if ($_SESSION['lugar'] == 'index') {
                ?>
                <img src="imagen/cosa2.jpg" width="60px" height="60px" alt="logo" class="icon"/>
            <?php } else { ?>
                <img src="../imagen/cosa2.jpg" width="60px" height="60px" alt="logo" class="icon"/>
            <?php } ?>
        </div>
    </div>
    <?php if (!isset($_SESSION['usuario'])) { ?>
        <div class="col">
            <div class="row tam justify-content-end align-items-center">
                <form class="form-inline">
                    <input class="btn btn-primary btn-sm mr-2" data-toggle="modal" data-target="#login" type="button" value="Login">
                    <input class="btn btn-primary btn-sm" data-toggle="modal" data-target="#registrar" type="button" value="Registro">
                </form>
            </div>
        </div>
        <?php
    } else {
        if ($_SESSION['lugar'] == 'index') {
            ?>
            <div class="col">
                <div class="row tam justify-content-end align-items-center">
                    <form action="controladores/Controlador.php" method="post">
                        <input type="submit" class="btn btn-primary btn-sm " value="Cerrar Sesion" name="CerrarSesion">
                    </form>
                </div>
            </div>
        <?php } else { ?>
            <div class="col">
                <div class="row tam justify-content-end align-items-center">
                    <form action="../controladores/Controlador.php" method="post">
                        <input type="submit" class="btn btn-primary btn-sm " value="Cerrar Sesion" name="CerrarSesion">
                    </form>
                </div>
            </div>
            <?php
        }
    }
    ?>
</div>
<?php include_once 'Modales.php'; ?>

