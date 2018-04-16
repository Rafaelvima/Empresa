<?php

use Service\Container;

require __DIR__ . '/bootstrap.php';

$container = new Container($configuration);
$equiposData = $container->getEquiposLoader()->findAll();
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
        <title>Equipos</title>

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
                <h1>Lista de Equipos</h1>
            </div>
            <table class="table table-hover">
                <caption><i class="fa fa-car"></i> Equipos potentes</caption>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Equipo</th>
                        <th>Estadio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($equiposData as $equipo) { ?>
                        <tr>
                            <td><?php echo $equipo->getId(); ?></td>
                            <td><?php echo $equipo->getNombre(); ?></td>
                            <td><?php echo $equipo->getEstadio(); ?></td>
                            <td>
                                <a href="jugadores.php?equipo_id=<?php echo $equipo->getId(); ?>" class="btn btn-default">ver jugadores del <?php echo $equipo->getNombre(); ?></a>
                                <a href="editor.php?equipo_id=<?php echo $equipo->getId(); ?>" class="btn btn-default">añadir jugadores del <?php echo $equipo->getNombre(); ?></a>
                            </td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </body>
</html>