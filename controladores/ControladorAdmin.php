<?php
require_once '../clases/ConexionEstatica.php';
require_once '../clases/Usuario.php';
require_once '../clases/Codificar.php';
session_start();

if (isset($_REQUEST['EliminarUsuario'])) {
    ConexionEstatica::AbrirConexion();
    
    
    header("location:../index.php");
    ConexionEstatica::cerrarConexion();    
}

if (isset($_REQUEST['ModificarUsuario'])) {
    ConexionEstatica::AbrirConexion();
    
    
    header("location:../index.php");    
    ConexionEstatica::cerrarConexion();
}

if (isset($_REQUEST['CerrarSesion'])) {
    session_destroy();
    header("location:../index.php");
}

