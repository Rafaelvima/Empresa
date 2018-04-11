<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Service;

use Model\Equipo;
use mysqli;

/**
 * Description of EquiposLoader
 *
 * @author User
 */
class EquiposLoader {

    //conexion
    private $mysqli;

    public function __construct($mysqli) {
        $this->mysqli = $mysqli;
    }

    public function findAll() {
        $equipos = $this->mysqli->query('SELECT * FROM equipos');
        return $this->getEquiposArray($equipos);
    }
    
    private function getEquiposArray($equiposArr) {
        $equiposResult = [];
        foreach ($equiposArr as $value) {
            $equiposResult[] = $this->createEquiposFromData($value);
        }
        return $equiposResult;
    }

    private function createEquiposFromData(array $allequipo) {

        $equipo = new Equipo($allequipo['id'], $allequipo['nombre'], $allequipo['estadio']);
        return $equipo;
    }

}
