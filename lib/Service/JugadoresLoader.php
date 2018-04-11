<?php

class JugadoresLoader {

    private $mysqli;

    public function __construct($mysqli) {
        $this->mysqli = $mysqli;
    }

    public function findJugadoresById($id_equipo) {
        if ($stmt = $mysqli->prepare("SELECT District FROM City WHERE Name=?")) {
            $stmt->bind_param("s", $city);
            $stmt->execute();
            $stmt->bind_result($district);
            $stmt->fetch();
            $stmt->close();
        }
        return $this->getEquiposArray($equipos);
    }

}
