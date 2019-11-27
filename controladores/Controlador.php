<?php
require_once '../clases/ConexionEstatica.php';
require_once '../clases/Usuario.php';
require_once '../clases/Codificar.php';
session_start();

if (isset($_REQUEST['validar'])) {
    ConexionEstatica::AbrirConexion();
    $clave = $_REQUEST['contra'];
    $clavecod = Codificar::codifica($clave);
    if (ConexionEstatica::ComprobarUsuario($_REQUEST['usuario'], $clavecod)) {
        $usuario = ConexionEstatica::obtenerUsuario($_REQUEST['usuario'], $clavecod);     
        $_SESSION['usuario'] = $usuario;
        header("location:../index.php");
    } else {
        header("location:../vistas/error.php");
    }
    ConexionEstatica::cerrarConexion();    
}

if (isset($_REQUEST['UltimaNoticia'])) {
    ConexionEstatica::AbrirConexion();
    $_SESSION['noticias']= ConexionEstatica::ObtenerNoticiaNueva();
    header("location:../vistas/noticias.php");
    ConexionEstatica::cerrarConexion();
}

if (isset($_REQUEST['NoticiaDestacada'])) {
    ConexionEstatica::AbrirConexion();
    $_SESSION['noticias']= ConexionEstatica::ObtenerNoticiaDestacada();
    header("location:../vistas/noticias.php");
    ConexionEstatica::cerrarConexion();
}

if (isset($_REQUEST['ListarNombrePagina'])) {
    ConexionEstatica::AbrirConexion();
    $_SESSION['juegosNombre']= ConexionEstatica::ObtenerJuegosNombre();
    header("location:../vistas/listar.php");
    ConexionEstatica::cerrarConexion();
}

if (isset($_REQUEST['ListarTematicaPagina'])) {
    ConexionEstatica::AbrirConexion();
    $_SESSION['juegosTematica']= ConexionEstatica::ObtenerJuegosTematica();
    header("location:../vistas/listar.php");
    ConexionEstatica::cerrarConexion();
}

if (isset($_REQUEST['AddJuegoPagina'])) {
    header("location:../vistas/addjuego.php");
}

if (isset($_REQUEST['ValidarJuegoPagina'])) {
    ConexionEstatica::AbrirConexion();
    $_SESSION['juegosValidar']=ConexionEstatica::ObtenerJuegosValidar();
    header("location:../vistas/ValidarJuego.php");
    ConexionEstatica::cerrarConexion();
}

if (isset($_REQUEST['CerrarSesion'])) {
    session_destroy();
    header("location:../index.php");
}

