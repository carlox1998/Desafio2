<?php
require_once '../clases/ConexionEstatica.php';
require_once '../clases/Usuario.php';
require_once '../clases/Codificar.php';
session_start();

if (isset($_REQUEST['EliminarUsuario'])) {
    ConexionEstatica::AbrirConexion();
    $usuario=$_SESSION['usuario'];
    ConexionEstatica::EliminarUsuario($_REQUEST['Correo']);
    $_SESSION['usuarios']=ConexionEstatica::obtenerUsuariosExcepcion($usuario->getCorreo());    
    header("location:../vistas/ListarUsuarios.php");
    ConexionEstatica::cerrarConexion();    
}

if (isset($_REQUEST['ModificarUsuario'])) {
    ConexionEstatica::AbrirConexion();
    $usuario=$_SESSION['usuario'];
    if(strcmp($_REQUEST['CambiarRol'], 'Usuario')==0){
        $rol=0;
    }else{
        $rol=1;
    }
    ConexionEstatica::ModificarUsuario($_REQUEST['Correo'], $_REQUEST['Nombre'], $rol);
    $_SESSION['usuarios']=ConexionEstatica::obtenerUsuariosExcepcion($usuario->getCorreo());  
    header("location:../vistas/ListarUsuarios.php");    
    ConexionEstatica::cerrarConexion();
}

if (isset($_REQUEST['CambiarRol'])) {
    ConexionEstatica::AbrirConexion();
    $usuario=$_SESSION['usuario'];
    if($_REQUEST['CambiarRol']=='Usuario'){
        $rol=1;
    }else{
        $rol=0;
    }
    ConexionEstatica::ModificarUsuario($_REQUEST['Correo'], $_REQUEST['Nombre'], $rol);
    $_SESSION['usuarios']=ConexionEstatica::obtenerUsuariosExcepcion($usuario->getCorreo());    
    header("location:../vistas/ListarUsuarios.php");
    ConexionEstatica::cerrarConexion();    
}

if (isset($_REQUEST['AddJuego'])) {
    ConexionEstatica::AbrirConexion();
    ConexionEstatica::ValidarJuegos($_REQUEST['Nombre']);
    $_SESSION['juegosValidar']=ConexionEstatica::ObtenerJuegosValidar();
    $_SESSION['Tematica']= ConexionEstatica::obtenerTematicas();    
    header("location:../vistas/ValidarJuego.php");
    ConexionEstatica::cerrarConexion();
}

if (isset($_REQUEST['EliminarJuego'])) {
    ConexionEstatica::AbrirConexion();
    ConexionEstatica::EliminarJuego($_REQUEST['Nombre']);
    $_SESSION['juegosValidar']=ConexionEstatica::ObtenerJuegosValidar();
    $_SESSION['Tematica']= ConexionEstatica::obtenerTematicas();
    header("location:../vistas/ValidarJuego.php");
    ConexionEstatica::cerrarConexion();
}

if (isset($_REQUEST['AddTematica'])) {
    ConexionEstatica::AbrirConexion();
    ConexionEstatica::InsertarTematica($_REQUEST['Nombre'], $_REQUEST['Tematica']);    
    header("location:../vistas/ValidarJuego.php");
    ConexionEstatica::cerrarConexion();
}

