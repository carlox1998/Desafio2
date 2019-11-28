<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Noticia
 *
 * @author carlox
 */
class Noticia {
    private $Titulo;
    private $Contenido;
    private $Autor;
    
    function __construct($Titulo, $Contenido, $Autor) {
        $this->Titulo = $Titulo;
        $this->Contenido = $Contenido;
        $this->Autor = $Autor;
    }
    
    function getTitulo() {
        return $this->Titulo;
    }

    function getContenido() {
        return $this->Contenido;
    }

    function getAutor() {
        return $this->Autor;
    }

    function setTitulo($Titulo) {
        $this->Titulo = $Titulo;
    }

    function setContenido($Contenido) {
        $this->Contenido = $Contenido;
    }

    function setAutor($Autor) {
        $this->Autor = $Autor;
    }

}
