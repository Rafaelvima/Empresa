<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Service;

/**
 * Description of Container
 *
 * @author User
 */
class Container {

    private $configuration;
    
    private $mysqli;
    
     public function __construct(array $configuration)
    {
        $this->configuration = $configuration;
    }
     public function getMysqli()
    {
         
        if ($this->mysqli === null) {
            $this->mysqli = new \mysqli(
                $this->configuration['db_sname'],
                $this->configuration['db_user'],
                $this->configuration['db_pass'],
                $this->configuration['db_dbname']
            );
        }

        return $this->mysqli;
    }
    public function getEquiposLoader(){
        return new EquiposLoader($this->getMysqli());
    }
    
}
