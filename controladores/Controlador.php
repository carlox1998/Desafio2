<?php

require_once '../clases/ConexionEstatica.php';
require_once '../clases/Usuario.php';
require_once '../clases/Codificar.php';
session_start();

if (isset($_REQUEST['validar'])) {
    ConexionEstatica::AbrirConexion();
    $clave = $_REQUEST['clave'];
    $clavecod = Codificar::codifica($clave);
    if (ConexionEstatica::ComprobarUsuario($_REQUEST['usuario'], $clavecod)) {
        $usuario = ConexionEstatica::obtenerUsuario($_REQUEST['usuario'], $clavecod);
        $_SESSION['usuario'] = $usuario;
        if ($_SESSION['lugar'] == 'index') {
            header("location:../index.php");
        } else {
            header("location:../vistas/" . $_SESSION['lugar'] . ".php");
        }
    } else {
        header("location:../vistas/error.php");
    }
    ConexionEstatica::cerrarConexion();
}

if (isset($_REQUEST['registrarse'])) {
    ConexionEstatica::AbrirConexion();
    $dn = $_REQUEST['dni'];
    $co = $_REQUEST['correo'];
    $cla = $_REQUEST['contra'];
    $clavecod = Codificar::codifica($cla);
    $no = $_REQUEST['nombre'];
    ConexionEstatica::InsertarUsuario($dn, $co, $clavecod, $no);
    if ($_SESSION['lugar'] == 'index') {
        header("location:../index.php");
    } else {
        header("location:../vistas/" . $_SESSION['lugar'] . ".php");
    }
    ConexionEstatica::cerrarConexion();
}

if (isset($_REQUEST['UltimaNoticia'])) {
    ConexionEstatica::AbrirConexion();
    //$_SESSION['noticias']= ConexionEstatica::ObtenerNoticiasNuevas();
    header("location:../vistas/noticias.php");
    ConexionEstatica::cerrarConexion();
}

if (isset($_REQUEST['NoticiaDestacada'])) {
    ConexionEstatica::AbrirConexion();
    //$_SESSION['noticias']= ConexionEstatica::ObtenerNoticiasDestacadas();
    header("location:../vistas/noticias.php");
    ConexionEstatica::cerrarConexion();
}

if (isset($_REQUEST['ListarNombrePagina'])) {
    unset($_SESSION['juegosTematica']);
    ConexionEstatica::AbrirConexion();
    $_SESSION['juegosNombre'] = ConexionEstatica::ListarJuegosNombre('A');
    header("location:../vistas/ListarJuegos.php");
    ConexionEstatica::cerrarConexion();
}

if (isset($_REQUEST['ListarNombre'])) {
    unset($_SESSION['juegosTematica']);
    $n = $_REQUEST['ListarNombre'];
    ConexionEstatica::AbrirConexion();
    $_SESSION['juegosNombre'] = ConexionEstatica::ListarJuegosNombre($n);
    header("location:../vistas/ListarJuegos.php");
    ConexionEstatica::cerrarConexion();
}

if (isset($_REQUEST['ListarTematicaPagina'])) {
    unset($_SESSION['juegosNombre']);
    ConexionEstatica::AbrirConexion();
    $_SESSION['juegosTematica'] = ConexionEstatica::ListarJuegosTematica('Accion');
    $_SESSION['Tematica'] = ConexionEstatica::obtenerTematicas();
    header("location:../vistas/ListarJuegos.php");
    ConexionEstatica::cerrarConexion();
}

if (isset($_REQUEST['ListarTematica'])) {
    unset($_SESSION['juegosNombre']);
    ConexionEstatica::AbrirConexion();
    $_SESSION['juegosTematica'] = ConexionEstatica::ListarJuegosTematica($_REQUEST['ListarTematica']);
    $_SESSION['Tematica'] = ConexionEstatica::obtenerTematicas();
    header("location:../vistas/ListarJuegos.php");
    ConexionEstatica::cerrarConexion();
}

if (isset($_REQUEST['AddJuegoPagina'])) {
    header("location:../vistas/addjuego.php");
}

if (isset($_REQUEST['ModUsuarioPagina'])) {
    ConexionEstatica::AbrirConexion();
    $usuario = $_SESSION['usuario'];
    $_SESSION['usuarios'] = ConexionEstatica::obtenerUsuariosExcepcion($usuario->getCorreo());
    header("location:../vistas/ListarUsuarios.php");
    ConexionEstatica::cerrarConexion();
}


if (isset($_REQUEST['ValidarJuegoPagina'])) {
    ConexionEstatica::AbrirConexion();
    $_SESSION['juegosValidar'] = ConexionEstatica::ObtenerJuegosValidar();
    $_SESSION['Tematica'] = ConexionEstatica::obtenerTematicas();
    header("location:../vistas/ValidarJuego.php");
    ConexionEstatica::cerrarConexion();
}

if (isset($_REQUEST['CerrarSesion'])) {
    session_destroy();
    header("location:../index.php");
}

