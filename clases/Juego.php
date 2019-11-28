<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Juego
 *
 * @author carlox
 */
class Juego {
    private $Foto;
    private $Nombre;
    private $Descripcion;
    private $Tematica;
    private $Plataforma;
    private $F_Salida;
    private $E_Minima;
    private $Validado;
    
    function __construct($Foto, $Nombre, $Descripcion, $Tematica, $Plataforma, $F_Salida, $E_Minima, $Validado) {
        $this->Foto = $Foto;
        $this->Nombre = $Nombre;
        $this->Descripcion = $Descripcion;
        $this->Tematica = $Tematica;
        $this->Plataforma = $Plataforma;
        $this->F_Salida = $F_Salida;
        $this->E_Minima = $E_Minima;
        $this->Validado = $Validado;
    }
    
    function getFoto() {
        return $this->Foto;
    }

    function getNombre() {
        return $this->Nombre;
    }

    function getDescripcion() {
        return $this->Descripcion;
    }

    function getTematica() {
        return $this->Tematica;
    }

    function getPlataforma() {
        return $this->Plataforma;
    }

    function getF_Salida() {
        return $this->F_Salida;
    }

    function getE_Minima() {
        return $this->E_Minima;
    }

    function getValidado() {
        return $this->Validado;
    }

    function setFoto($Foto) {
        $this->Foto = $Foto;
    }

    function setNombre($Nombre) {
        $this->Nombre = $Nombre;
    }

    function setDescripcion($Descripcion) {
        $this->Descripcion = $Descripcion;
    }

    function setTematica($Tematica) {
        $this->Tematica = $Tematica;
    }

    function setPlataforma($Plataforma) {
        $this->Plataforma = $Plataforma;
    }

    function setF_Salida($F_Salida) {
        $this->F_Salida = $F_Salida;
    }

    function setE_Minima($E_Minima) {
        $this->E_Minima = $E_Minima;
    }

    function setValidado($Validado) {
        $this->Validado = $Validado;
    }

}
