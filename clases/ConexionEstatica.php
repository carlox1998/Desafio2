<?php

require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/TemaPHP/Ejercicios/Desafio2/Const/Constantes.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/TemaPHP/Ejercicios/Desafio2/clases/Usuario.php');
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

    /**
     * Funcion para conectarse a la Base de Datos
     */
    static function AbrirConexion() {
        self::$conexion = new mysqli('localhost', Constantes::$usuario, Constantes::$pass, Constantes::$base);
        print "Conexión realizada de forma de objeto: " . self::$conexion->get_server_info() . "<br/>";
        if (self::$conexion->errno) {
            print "Fallo al conectar a MySQL: " . self::$conexion->connect_error;
        }
    }

    /**
     * Funcion que Obtiene a todos los Usuarios excepto al que se ha conectado para hacer el crud
     * @param type $correo
     * @return \Usuario
     */
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

    /**
     * Funcion que obtiene todas las Noticias Nuevas.
     * @param type $tipo
     * @return \Noticia
     */
    static function ObtenerNoticiasNuevas($tipo) {
        $query = "SELECT * FROM noticias where Tipo = ? ";
        $stmt = self::$conexion->prepare($query);
        $stmt->bind_param("s", $tipo);
        if ($stmt->execute()) {
            $resultado = $stmt->get_result();
            while ($fila = $resultado->fetch_assoc()) {
                $noticias[] = new Noticia($fila["Titulo"], $fila["Contenido"], $fila["Autor"]);
            }
        } else {
            echo 'Fallo';
        }
        $stmt->close();

        return $noticias;
    }

    static function ObtenerJuegosValidar() {
        $query = "SELECT * FROM juegos where Validado = 0 ";
        $stmt = self::$conexion->prepare($query);
        if ($stmt->execute()) {
            $resultado = $stmt->get_result();
            while ($fila = $resultado->fetch_assoc()) {
                $juegos[] = new Juego($fila["Foto"], $fila["Nombre"], $fila["Descripcion"], $fila["Tematica"], $fila["Plataforma"], $fila["F_Salida"], $fila["E_Minima"], $fila["Validado"]);
            }
        } else {
            echo 'Fallo';
        }
        $stmt->close();
        return $juegos;
    }

    /**
     * Funcion que Obtiene las noticias destacadas
     * @param type $tipo
     * @return \Noticia
     */
    static function ObtenerNoticiasDestacadas($tipo) {
        $query = "SELECT * FROM noticias where Tipo = ? ";
        $stmt = self::$conexion->prepare($query);
        $stmt->bind_param("s", $tipo);
        if ($stmt->execute()) {
            $resultado = $stmt->get_result();
            while ($fila = $resultado->fetch_assoc()) {
                $noticias[] = new Noticia($fila["Titulo"], $fila["Contenido"], $fila["Autor"]);
            }
        } else {
            echo 'Fallo';
        }
        $stmt->close();

        return $noticias;
    }

    /**
     * Funcion que obtiene los juegos segun empiezen por la letra que han pedido los usuarios
     * @param type $letra
     * @return \Noticia
     */
    static function ListarJuegosNombre($letra) {
        $juegos="null";
        $letra=$letra.'%';
        $query = "SELECT * FROM juegos where Nombre = ? ";
        $stmt = self::$conexion->prepare($query);
        $stmt->bind_param("s", $letra);
        if ($stmt->execute()) {
            $resultado = $stmt->get_result();
            while ($fila = $resultado->fetch_assoc()) {
                $juegos[] = new Juego($fila["Foto"],$fila["Nombre"],$fila["Descripcion"],$fila["Plataforma"] ,$fila["F_Salida"],$fila["E_Minima"],$fila["Validado"]);
            }
        } else {
            echo 'Fallo';
        }
        $stmt->close();

        return $juegos;
    }

    /**
     * Funcion que obtiene los juegos segun la tematica que han pedido los usuarios
     * @param type $tipo
     * @return \Noticia
     */
    static function ListarJuegosTematica($tipo) {
        $juegos="null";
        $query = "SELECT * FROM juegos WHERE Nombre=(SELECT Id_juego FROM juegostematica WHERE Id_tematica=(SELECT Id FROM tematicas WHERE Nombre= ? )) ";
        $stmt = self::$conexion->prepare($query);
        $stmt->bind_param("s", $tipo);
        if ($stmt->execute()) {
            $resultado = $stmt->get_result();
            while ($fila = $resultado->fetch_assoc()) {
                $juegos[] = new Juego($fila["Foto"],$fila["Nombre"],$fila["Descripcion"],$fila["Plataforma"] ,$fila["F_Salida"],$fila["E_Minima"],$fila["Validado"]);
            }
        } else {
            echo 'Fallo';
        }
        $stmt->close();

        return $juegos;
    }

    /**
     * Funcion que obtiene al Usuario que hace un login en la pagina
     * @param type $correo
     * @param type $clave
     * @return \Usuario
     */
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

    /**
     * Funcion que comprueba si el usuario que hace login esta en nuestra Base de Datos
     * @param type $correo
     * @param type $clave
     * @return boolean
     */
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

    /*
     * Funcion para insertar Usuarios a la Base de Datos
     */

    static function InsertarUsuario($dn, $co, $cla, $no) {
        $query = "INSERT INTO usuario (DNI, Correo, Clave, Nombre,Rol) VALUES (?,?,?,?,0)";
        $stmt = self::$conexion->prepare($query);
        $stmt->bind_param("ssss", $dn, $co, $cla, $no);
        if ($stmt->execute()) {
            echo 'OK';
        } else {
            echo 'Falla';
        }
        $stmt->close();
    }

    /**
     * Funcion para añadir juegos a la Base de Datos
     * @param type $foto
     * @param type $no
     * @param type $des
     * @param type $tem
     * @param type $plat
     * @param type $FSalida
     * @param type $EMinima
     */
    static function InsertarJuego($foto,$no, $des,$plat,$FSalida,$EMinima) {
        $query = "INSERT INTO juegos (Foto, Nombre, Descripcion,Plataforma,Fecha_Salida,Edad_Minima,Validado) VALUES (?,?,?,?,?,?,0)";
        $stmt = self::$conexion->prepare($query);
        $stmt->bind_param("bsssssi", $foto, $no, $des, $tem, $plat, $FSalida, $EMinima);
        if ($stmt->execute()) {
            echo 'OK';
        } else {
            echo 'Falla';
        }
        $stmt->close();
    }

    /**
     * Funcion para eliminar Usuarios
     * @param type $correo
     */
    static function EliminarUsuario($correo) {
        $query = "DELETE FROM usuario WHERE Correo = '" . $correo . "'";
        if (self::$conexion->query($query)) {
            echo "Registro borrado";
        } else {
            echo "Error al borrar: " . mysqli_error(ConexionEstatica::$conexion);
        }
    }

    /**
     * Funcion para modificar a los Usuarios
     * @param type $correo
     * @param type $nombre
     * @param type $rol
     */
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

    /**
     * Funcion para que el administrador valide un juego que los usuarios hayan añadido
     * @param type $correo
     * @param type $nombre
     * @param type $rol
     */
    static function ValidarJuegos($id, $nombre, $rol) {
        $query = "Update juegos set Validado= 1 WHERE Id = '" . $id . "'";
        $stmt = self::$conexion->prepare($query);
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
