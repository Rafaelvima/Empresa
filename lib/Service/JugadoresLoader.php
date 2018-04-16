<?php

namespace Service;

use Model\Jugador;

class JugadoresLoader {

    private $mysqli;

    public function __construct($mysqli) {
        $this->mysqli = $mysqli;
    }

    public function findAll() {
        $jugadores = $this->mysqli->query("SELECT * FROM jugadores");
        return $this->getJugadoresArray($jugadores);
    }

    public function findAllJugadorById($id) {
        $jugador = $this->mysqli->real_escape_string($id);
        $jugadores = $this->mysqli->query("SELECT * FROM jugadores WHERE id='$jugador'");
        return $this->getJugadoresArray($jugadores);
    }

    public function insert($nombre, $edad, $equipo_id) {
        $stmt = $this->mysqli->prepare("INSERT INTO jugadores (nombre, edad, equipo_id) VALUES (?, ?, ?)");
        $stmt->bind_param('sii', $nombre, $edad, $equipo_id);
        $stmt->execute();
        return $stmt->affected_rows;
    }
    
    public function update($id, $nombre, $edad) {
        $stmt = $this->mysqli->prepare("UPDATE jugadores SET nombre=?, edad=? WHERE id=?");
        $stmt->bind_param('sii', $nombre, $edad, $id);
        $stmt->execute();
        return $stmt->affected_rows;
    }

    public function delete($id) {
        $stmt = $this->mysqli->prepare("DELETE FROM jugadores WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
    }

    public function findJugadoresById($equipo_id) {
        $equipo = $this->mysqli->real_escape_string($equipo_id);
        $jugadores = $this->mysqli->query("SELECT * FROM jugadores WHERE equipo_id = '$equipo'");
        return $this->getJugadoresArray($jugadores);
    }

    private function getJugadoresArray($jugadoresArr) {
        $jugadoresResult = [];
        foreach ($jugadoresArr as $value) {
            $jugadoresResult[] = $this->createJugadoresFromData($value);
        }
        return $jugadoresResult;
    }

    private function createJugadoresFromData(array $allJugadores) {
        $jugador = new Jugador($allJugadores['id'], $allJugadores['nombre'], $allJugadores['edad'], $allJugadores['equipo_id']);
        return $jugador;
    }
}
