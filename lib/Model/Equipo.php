<?php

namespace Model;

class Equipo {

    private $id;
    private $nombre;
    private $estadio;

    function __construct($id, $nombre, $estadio) {
        $this->id=$id;
        $this->nombre=$nombre;
        $this->estadio=$estadio;
    }
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getEstadio() {
        return $this->estadio;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setEstadio($estadio) {
        $this->estadio = $estadio;
    }

}
