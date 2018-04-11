<?php

namespace Model;

class Jugador {

    private $id;
    private $nombre;
    private $apellido;
    private $posicion;
    private $dorsal;
    private $equipo_id;
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getPosicion() {
        return $this->posicion;
    }

    function getDorsal() {
        return $this->dorsal;
    }

    function getEquipo_id() {
        return $this->equipo_id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setPosicion($posicion) {
        $this->posicion = $posicion;
    }

    function setDorsal($dorsal) {
        $this->dorsal = $dorsal;
    }

    function setEquipo_id($equipo_id) {
        $this->equipo_id = $equipo_id;
    }


    
    
    
    
}
