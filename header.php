<?php ?>

<div class="row tam">
    <div class="col">
        <div class="media">
             <?php
             $n=getcwd();             
             if (strcmp($n,'C:\xampp\htdocs\TemaPHP\Ejercicios\Desafio2')==0) { ?>
            <img src="imagen/cosa2.jpg" width="60px" height="60px" alt="logo" class="icon"/>
             <?php }else{ ?>
            <img src="../imagen/cosa2.jpg" width="60px" height="60px" alt="logo" class="icon"/>
            <?php } ?>
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

