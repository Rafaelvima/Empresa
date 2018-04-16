<?php

use Service\Container;

require __DIR__ . '/bootstrap.php';

$container = new Container($configuration);

if (isset($_POST['action']) && $_POST['action'] == 0) {
    $container->getJugadoresLoader()->insert($_POST['nombre'], $_POST['edad'], $_POST['equipo_id']);
    header('Location: http://localhost/EquiposOO/jugadores.php?equipo_id=' . $_POST['equipo_id']);
} elseif (isset($_POST['action']) && $_POST['action'] == 1) {
    $container->getJugadoresLoader()->update($_POST['id'], $_POST['nombre'], $_POST['edad']);
    header('Location: http://localhost/EquiposOO/jugadores.php?equipo_id=' . $_POST['equipo_id']);
} elseif (isset($_GET['action']) && $_GET['action'] == 2) {
    $container->getJugadoresLoader()->delete($_GET['id']);
    header('Location: http://localhost/EquiposOO/jugadores.php?equipo_id=' . $_GET['equipo_id']);
} else {
    echo 'ERROR: NO ACTION';
}