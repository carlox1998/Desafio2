<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Codificar
 *
 * @author carlox
 */
class Codificar {

    static function codifica($cadenaPlana) {
        $cadCodificada = md5($cadenaPlana);
        return $cadCodificada;
    }

}
