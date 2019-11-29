<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author carlox
 */
class Usuario {

    private $Dni;
    private $Correo;
    private $Clave;
    private $Nombre;
    private $Rol;

    function __construct($Dni, $Correo, $Clave, $Nombre, $Rol) {
        $this->Dni = $Dni;
        $this->Correo = $Correo;
        $this->Clave = $Clave;
        $this->Nombre = $Nombre;
        $this->Rol = $Rol;
    }

    function getDni() {
        return $this->Dni;
    }

    function getCorreo() {
        return $this->Correo;
    }

    function getClave() {
        return $this->Clave;
    }

    function getNombre() {
        return $this->Nombre;
    }

    function getRol() {
        return $this->Rol;
    }

    function setDni($Dni) {
        $this->Dni = $Dni;
    }

    function setCorreo($Correo) {
        $this->Correo = $Correo;
    }

    function setClave($Clave) {
        $this->Clave = $Clave;
    }

    function setNombre($Nombre) {
        $this->Nombre = $Nombre;
    }

    function setRol($Rol) {
        $this->Rol = $Rol;
    }

}
