<?php

namespace Model;

class Jugador {

    private $id;
    private $nombre;
    private $edad;
    private $equipo_id;
    
    function __construct($id, $nombre, $edad, $equipo_id) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->equipo_id = $equipo_id;
    }

    
    function getId() {
        return $this->id;
    }

    function getEdad() {
        return $this->edad;
    }

    function setEdad($edad) {
        $this->edad = $edad;
    }

        function getNombre() {
        return $this->nombre;
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

    function setEquipo_id($equipo_id) {
        $this->equipo_id = $equipo_id;
    }


    
    
    
    
}
