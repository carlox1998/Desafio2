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
        $_SESSION['lugar']='otra';?>
        <p>Error 404 tu correo o clave no se encuentra en nuestra Base de Datos, asegurate de que esten bien.</p>
        <form action="../index.php">
            <input type="submit" value="Volver">
        </form>

    </body>
</html>
