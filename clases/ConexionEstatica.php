<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConexionEstatica
 *
 * @author carlox
 */
class ConexionEstatica {

    public static $conexion;

    static function AbrirConexion() {
        self::$conexion = new mysqli('localhost', Constantes::$usuario, Constantes::$pass, Constantes::$base);
        print "Conexión realizada de forma de objeto: " . self::$conexion->get_server_info() . "<br/>";
        if (self::$conexion->errno) {
            print "Fallo al conectar a MySQL: " . self::$conexion->connect_error;
        }
    }

    static function obtenerUsuariosExcepcion($correo) {
        $query = "SELECT * FROM usuario where Correo != ? ";
        $stmt = self::$conexion->prepare($query);
        $stmt->bind_param("s", $correo);
        if ($stmt->execute()) {
            $resultado = $stmt->get_result();
            while ($fila = $resultado->fetch_assoc()) {
                $usuarios[] = new Usuario($fila["DNI"], $fila["Correo"], $fila["Clave"], $fila["Nombre"], $fila["Rol"]);
            }
        } else {
            echo 'Fallo';
        }
        $stmt->close();

        return $usuarios;
    }

    static function obtenerUsuario($correo, $clave) {
        $query = "SELECT * FROM usuario where Correo = ? and Clave = ?";
        $stmt = self::$conexion->prepare($query);
        $stmt->bind_param("ss", $correo, $clave);
        if ($stmt->execute()) {
            $resultado = $stmt->get_result();
            $fila = $resultado->fetch_assoc();
            $usuario = new Usuario($fila["DNI"], $fila["Correo"], $fila["Clave"], $fila["Nombre"], $fila["Rol"]);
        } else {
            echo 'Fallo';
        }
        $stmt->close();
        return $usuario;
    }

    static function ComprobarUsuario($correo, $clave) {
        $sol = true;
        $query = "SELECT * FROM usuario where Correo = ? and Clave = ?";
        $stmt = self::$conexion->prepare($query);
        $stmt->bind_param("ss", $correo, $clave);
        if ($stmt->execute()) {
            $resultado = $stmt->get_result();
            if ($fila = $resultado->fetch_assoc()) {
                $usuario = new Usuario($fila["DNI"], $fila["Correo"], $fila["Clave"], $fila["Nombre"], $fila["Rol"]);
            } else {
                $sol = false;
            }
        } else {
            echo 'Fallo';
        }
        $stmt->close();
        return $sol;
    }
    
    static function InsertarUsuario($dn, $co, $cla, $no) {
        $query = "INSERT INTO usuario (DNI, Correo, Clave, Nombre,Rol,PartidasGanadas) VALUES (?,?,?,?,0,0)";
        $stmt = self::$conexion->prepare($query);
        $stmt->bind_param("ssss", $dn, $co, $cla, $no);
        if ( $stmt->execute()) {
            echo 'OK';
        } else {
            echo 'Falla';
        }
        $stmt->close();
    }
    
    static function EliminarUsuario($correo) {
        $query = "DELETE FROM usuario WHERE Correo = '" . $correo . "'";
        if (self::$conexion->query($query)) {
            echo "Registro borrado";
        } else {
            echo "Error al borrar: " . mysqli_error(ConexionEstatica::$conexion);
        }
    }
    
    static function ModificarUsuario($correo, $nombre, $rol) {
        $query = "Update usuario set Nombre= ?, Rol= ? WHERE Correo = '" . $correo . "'";
        $stmt = self::$conexion->prepare($query);
        $stmt->bind_param("si", $nombre, $rol);
        if ($stmt->execute()) {
            echo 'OK';
        } else {
            echo 'Falla';
        }
        $stmt->close();
    }
    
    static function cerrarConexion() {
        self::$conexion->close();
        print "Conexión 2 cerrada" . "<br />";
    }

}
