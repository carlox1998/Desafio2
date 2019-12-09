<?php ?>
<div id="registrar" class="modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">
                    Título
                </div>            
            </div>
            <div class="modal-body">
                <?php
                if ($_SESSION['lugar']=='index') {
                    ?>
                    <form name="formulario" action="controladores/Controlador.php" method="post">
                        <div class="form-group">
                            <label for="dni">DNI</label>
                            <input id="dni" name="dni" type="text" required> 
                        </div>
                        <div class="form-group">
                            <label for="correo">Correo</label>
                            <input id="correo" name="correo" type="text" required>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input id="nombre" name="nombre" type="text" required>
                        </div>
                        <div class="form-group">
                            <label for="contra">Password</label>
                            <input id="contra" name="contra" type="password">
                        </div>
                        <div class="form-group">
                            <label for="contra2">Repite Password</label>
                            <input id="contra2" name="contra2" type="password">
                        </div>
                        <input type="submit" name="registrarse" id="registrarse" value="Aceptar">
                    </form>
<?php } else { ?>
                    <form name="formulario" action="../controladores/Controlador.php" method="post">
                        <div class="form-group">
                            <label for="dni">DNI</label>
                            <input id="dni" name="dni" type="text" required> 
                        </div>
                        <div class="form-group">
                            <label for="correo">Correo</label>
                            <input id="correo" name="correo" type="text" required>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input id="nombre" name="nombre" type="text" required>
                        </div>
                        <div class="form-group">
                            <label for="contra">Password</label>
                            <input id="contra" name="contra" type="password">
                        </div>
                        <div class="form-group">
                            <label for="contra2">Repite Password</label>
                            <input id="contra2" name="contra2" type="password">
                        </div>
                        <input type="submit" name="registrarse" id="registrarse" value="Aceptar">
                    </form>
<?php } ?>
            </div>
            <div class="modal-footer">
                Pie de la ventana modal
            </div>
        </div>
    </div>
</div>

<div id="login" class="modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">
                    <div class="alert alert-primary alert-dismissible show fade">
                        Login:
                        <button type="button" class="close align-items-end" data-dismiss="modal">X</button>
                    </div>
                </div>            
            </div>
            <div class="modal-body">
<?php if ($_SESSION['lugar']=='index') { ?>
                    <form name="formulario" action="controladores/Controlador.php" method="post">
                        <div class="form-group">
                            <label for="usuario">Usuario</label>
                            <input id="usuario" name="usuario" type="text" required>
                        </div>
                        <div class="form-group">
                            <label for="clave">Password</label>
                            <input id="clave" name="clave" type="password">
                        </div>
                        <input type="submit" name="validar" id="validar" value="Aceptar">
                    </form>
<?php } else { ?>
                    <form name="formulario" action="../controladores/Controlador.php" method="post">
                        <div class="form-group">
                            <label for="usuario">Usuario</label>
                            <input id="usuario" name="usuario" type="text" required>
                        </div>
                        <div class="form-group">
                            <label for="clave">Password</label>
                            <input id="clave" name="clave" type="password">
                        </div>
                        <input type="submit" name="validar" id="validar" value="Aceptar">
                    </form>
<?php } ?>                
            </div>
            <div class="modal-footer">
                Pie de la ventana modal
            </div>
        </div>
    </div>
</div>

