<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Service;

use mysqli;

class Container {

    private $configuration;
    private $mysqli;
    private $equiposLoader;
    private $jugadoresLoader;

    public function __construct(array $configuration) {
        $this->configuration = $configuration;
    }

    public function getMysqli() {

        if ($this->mysqli === null) {
            $this->mysqli = new mysqli(
                    $this->configuration['db_sname'], $this->configuration['db_user'], $this->configuration['db_pass'], $this->configuration['db_dbname']
            );
        }

        return $this->mysqli;
    }

    public function getEquiposLoader() {
        if ($this->equiposLoader === null) {
            $this->equiposLoader = new EquiposLoader($this->getMysqli());
        }
        return $this->equiposLoader;
    }

    public function getJugadoresLoader() {
        if ($this->jugadoresLoader === null) {
            $this->jugadoresLoader = new JugadoresLoader($this->getMysqli());
        }
        return $this->jugadoresLoader;
    }

}
