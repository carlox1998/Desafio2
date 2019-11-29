<?php
require_once '../clases/ConexionEstatica.php';
require_once '../clases/Usuario.php';
require_once '../clases/Codificar.php';
session_start();

if (isset($_REQUEST['validar'])) {
    ConexionEstatica::AbrirConexion();
    $clave = $_REQUEST['clave'];
    //$clavecod = Codificar::codifica($clave);
    if (ConexionEstatica::ComprobarUsuario($_REQUEST['usuario'], $clave)) {
        $usuario = ConexionEstatica::obtenerUsuario($_REQUEST['usuario'], $clave);     
        $_SESSION['usuario'] = $usuario;
        header("location:../index.php");
    } else {
        header("location:../vistas/error.php");
    }
    ConexionEstatica::cerrarConexion();    
}

if (isset($_REQUEST['registrarse'])) {
    ConexionEstatica::AbrirConexion();
    $dn=$_REQUEST['dni'];
    $co=$_REQUEST['correo'];
    $cla=$_REQUEST['contra'];
    $clavecod = Codificar::codifica($clave);
    $no=$_REQUEST['nombre'];
    ConexionEstatica::InsertarUsuario($dn, $co, $clavecod, $no);      
    header("location:../index.php");    
    ConexionEstatica::cerrarConexion();
}

if (isset($_REQUEST['UltimaNoticia'])) {
    ConexionEstatica::AbrirConexion();
    $_SESSION['noticias']= ConexionEstatica::ObtenerNoticiasNuevas();
    header("location:../vistas/noticias.php");
    ConexionEstatica::cerrarConexion();
}

if (isset($_REQUEST['NoticiaDestacada'])) {
    ConexionEstatica::AbrirConexion();
    $_SESSION['noticias']= ConexionEstatica::ObtenerNoticiasDestacadas();
    header("location:../vistas/noticias.php");
    ConexionEstatica::cerrarConexion();
}

if (isset($_REQUEST['ListarNombrePagina'])) {
    unset($_SESSION['juegosTematica']);
    ConexionEstatica::AbrirConexion();
    if(!isset($_REQUEST['Letra'])){
    $_SESSION['juegosNombre']= ConexionEstatica::ListarJuegosNombre('A');        
    }
    else{
    $_SESSION['juegosNombre']= ConexionEstatica::ListarJuegosNombre($_REQUEST['Letra']);        
    }
    header("location:../vistas/ListarJuegos.php");
    ConexionEstatica::cerrarConexion();
}

if (isset($_REQUEST['ListarTematicaPagina'])) {
    unset($_SESSION['juegosNombre']);
    ConexionEstatica::AbrirConexion();
    if(!isset($_REQUEST['Letra'])){
    $_SESSION['juegosTematica']= ConexionEstatica::ListarJuegosTematica('Todos');         
    }
    else{
    $_SESSION['juegosTematica']= ConexionEstatica::ListarJuegosTematica($_REQUEST['Tematica']);        
    }
    
    header("location:../vistas/ListarJuegos.php");
    ConexionEstatica::cerrarConexion();
}

if (isset($_REQUEST['AddJuegoPagina'])) {
    header("location:../vistas/addjuego.php");
}

if (isset($_REQUEST['AddJuego'])) {
    ConexionEstatica::AbrirConexion();
    
    ConexionEstatica::InsertarJuego($foto, $no, $des, $tem, $plat, $FSalida, $EMinima);
    header("location:../vistas/addjuego.php");
    ConexionEstatica::cerrarConexion();
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

