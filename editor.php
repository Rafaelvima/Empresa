<?php

    use Service\Container;

    require __DIR__ . '/bootstrap.php';

    $container = new Container($configuration);
    
    /** Si tiene id de jugador será formulario para editar, en caso contrario será formulario para nuevo jugador */
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $jugadorData = $container->getJugadoresLoader()->findAllJugadorById($id);
        $equipo = $container->getEquiposLoader()->findNombreEquipo($jugadorData[0]->getEquipo_id());
    } else {
        $equipo_id = $_GET['equipo_id'];
        $equipo = $container->getEquiposLoader()->findNombreEquipo($equipo_id);
    }
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset = "utf-8">
        <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
        <meta name = "viewport" content = "width=device-width, initial-scale=1">
        <title>JUGADORES</title>

        <!--Bootstrap -->
        <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity = "sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin = "anonymous">
        <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity = "sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin = "anonymous">
        <link href = "//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel = "stylesheet">

        <!--HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <div class="container">
            <div class="page-header">
                <h1>JUGADOR DEL <?php echo $equipo[0]->getNombre(); ?></h1>
            </div>

        </div>
            <?php if (isset($_GET['id'])) { ?>
                <form id="form1" method="post" action="actionJugador.php">
                    <input type="hidden" name="action" value="1" >
                    <input type="hidden" name="equipo_id" value="<?php echo $equipo[0]->getId(); ?>" />
                    <input type="hidden" name="id" value="<?php echo $jugadorData[0]->getId(); ?>" />
                    Nombre<input type="text" name="nombre" value="<?php echo $jugadorData[0]->getNombre(); ?>">
                    Edad <input type="text" name="edad" value="<?php echo $jugadorData[0]->getEdad(); ?>">
                    <input type="submit" value="editar <?php echo $jugadorData[0]->getNombre(); ?>" />
                </form>
            <?php } else { ?>
                <form id="form1" method="post" action="actionJugador.php">
                    <input type="hidden" name="action" value="0" >
                    <input type="hidden" name="equipo_id" value="<?php echo $equipo[0]->getId(); ?>" />
                    Nombre<input type="text" name="nombre" value="">
                    Edad <input type="text" name="edad" value="">
                    <input type="submit" value="Nuevo Jugador" />
                </form>
            <?php } ?>
    </body>
</html>