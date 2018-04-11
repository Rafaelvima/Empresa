<?php

namespace Service;

use Model\Equipo;

class Equipos {

    /**
     *
     * @var EquiposLoader
     */
    private $equiposLoader;

    public function __construct($equiposLoader) {
        $this->equiposLoader = $equiposLoader;
    }

    
}
