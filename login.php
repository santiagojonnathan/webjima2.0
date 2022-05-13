<!DOCTYPE html>
<html lang="es">

<head>
    <title>JIMA</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum scale = 1, minimun-scale=1">
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <header>
        <div class="contenedor">

            <h1><img src="img/logojima.jpg" width="45px"> JIMA </h1>
            <input type="checkbox" id="menu-bar">
            <input type="checkbox" id="menu-bar">
            <label class="icon-menu" for="menu-bar"></label>
            <nav class="menu">
            <a href="index.php">Inicio</a>
                <a href="login.php">Iniciar Sesi&oacute;n</a>

            </nav>
        </div>
    </header>
    <?php

    include_once("banner.html");
    ?>

    <section id="blog">
        <form action="validarU.php" method="post" action="">
            <h1 style="color: white; align: center">INGRESE SUS DATOS</h1><br><br>
            <p>Usuario <input type="text" placeholder="Ingrese su clave" name="txtCve" required="true"></p>
            <p>Contrase&ntilde;a <input type="password" placeholder="Ingrese su contraseña" name="txtPwd" required="true"></p>
            <input type="submit" value="Ingresar">
        </form>
    </section>

    </main>
    <?php
    include_once("info.html");
    include_once("pie.html");
    ?>