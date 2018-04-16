<?php

use Service\Container;

require __DIR__ . '/bootstrap.php';
if (isset($_REQUEST['equipo_id'])) {
    $equipo_id = $_REQUEST['equipo_id'];
} else {
    $equipo_id = 1;
}
if (isset($_REQUEST['mensaje'])) {
    $mensaje = $_REQUEST['mensaje'];
    echo $mensaje;
} else {
    $mensaje = null;
}
$container = new Container($configuration);
//$jugadoresData = $container->getJugadoresLoader()->findAll();
$jugadoresData = $container->getJugadoresLoader()->findJugadoresById($equipo_id);
$equipo = $container->getEquiposLoader()->findNombreEquipo($equipo_id);
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>JUGADORES</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <div class="container">
            <div class="page-header">
                <h1>JUGADORES DEL   <?php echo $equipo[0]->getNombre(); ?>
                </h1>
            </div>
            <table class="table table-hover">
                <caption><i class="fa fa-ball"></i> jugadores chetaos</caption>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Equipo</th>
                        <th>Estadio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($jugadoresData as $jugador) { ?>
                        <tr>
                            <td><?php echo $jugador->getId(); ?></td>
                            <td><?php echo $jugador->getNombre(); ?></td>
                            <td><?php echo $jugador->getEdad(); ?></td>
                            <td>
                                <a href="editor.php?id=<?php echo $jugador->getId(); ?>" class="btn btn-default">editar a  <?php echo $jugador->getNombre(); ?></a>
                            <td>
                                <a href="actionJugador.php?id=<?php echo $jugador->getId();?>&equipo_id=<?php echo $jugador->getEquipo_id(); ?>&action=2" class="btn btn-default">eliminar a  <?php echo $jugador->getNombre(); ?></a>
                            </td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </body>
</html>