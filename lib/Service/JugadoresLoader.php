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

    /*

      case "insert":
      $stmt = $conn->prepare("INSERT INTO ASIGNATURAS (NOMBRE, CURSO, CICLO)"
      . "VALUES(?,?,?)");
      $stmt->bind_param("sss", $nombreasig, $cursoasig, $cicloasig);
      $stmt->execute();

      if ($stmt->affected_rows > 0) {
      echo "New record created successfully";
      } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
      }
      echo $conn->insert_id;
      break;
      case "update":
      $stmt = $conn->prepare("UPDATE ASIGNATURAS SET NOMBRE=?, CURSO=?, CICLO=? WHERE ID=?");
      $stmt->bind_param("sssi", $nombreasig, $cursoasig, $cicloasig, $idasig);
      $stmt->execute();
      if (($stmt->affected_rows > 0)) {
      echo "Record updated successfully";
      } else {
      echo "Error updating record: ";
      }
      break;
      case "delete":
      // sql to delete a record
      $stmt = $conn->prepare("DELETE FROM ASIGNATURAS WHERE id=?");
      $stmt->bind_param("i", $idasig);
      $stmt->execute();
      if (($stmt->affected_rows > 0)) {
      echo "Record deleted successfully";
      } else {
      echo "Error deleting record: " . $conn->error;
      }
      break;
      $sql = "SELECT * FROM ASIGNATURAS";
      if (!$result = $conn->query($sql)) {
      die('There was an error running the query [' . $conn->error . ']');
      }
      echo 'Total results: ' . $result->num_rows;

     *      */
}
