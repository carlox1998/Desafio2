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

}
