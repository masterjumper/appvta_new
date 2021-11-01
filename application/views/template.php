<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo APPNAME; ?></title>
    <link href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html"><?php echo APPNAME; ?></a>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <?php echo $_SESSION['usunom'] . ' ' . $_SESSION['usuape'] ?>
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="<?php echo base_url().'index.php?/PerfilUsuario/index'?>"><i class="fa fa-id-card"></i> Mi Perfil</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="<?php echo base_url().'index.php?/Login/index'?>"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="<?php echo base_url().'index.php?/login/inicio';?>"><i class="fa fa-home"></i> Inicio</a>
                    </li>

                    <li>
                        <a href="<?php echo base_url().'index.php?/grupocrea/index'?>"><i class="fa fa-sitemap"></i> Grupo CREA</a>
                    </li>
                    <!--
                    <li>
                        <a href="<?php //echo base_url().'index.php?/tipomovilidad/index'?>"><i class="fa fa-car"></i> Tipo Movilidad</a>
                    </li>
                    <li>
                        <a href="<?php //echo base_url().'index.php?/tarifa/index'?>"><i class="fa fa-money"></i> Tarifa</a>
                    </li>
                    <li>
                        <a href="<?php //echo base_url().'index.php?/moneda/index'?>"><i class="fa fa-university"></i> Monedas</a>
                    </li>
                    <li>
                        <a href="<?php //echo base_url().'index.php?/Informe/index'?>"><i class="fa fa-newspaper-o"></i> Informes</a>
                    </li>
                    -->
                    <li>
                        <a href="#"><i class="fa fa-user-secret"></i> Seguridad<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url().'index.php?/Grupo/index'?>"><i class="fa fa-folder"></i> Grupos de Usuarios</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url().'index.php?/Usuario/index'?>"><i class="fa fa-user"></i> Usuarios</a>
                            </li>
                            <!--
                            <li>
                                <a href="<?php //echo base_url().'index.php?/Configuracion/index'?>"><i class="fa fa-cogs"></i> Configuracion</a>
                            </li>
                            <li>
                                <a href="<?php //echo base_url().'index.php?/TipoRendicion/index'?>"><i class="fa fa-align-center"></i> Tipo Rendiciones</a>
                            </li>
                            -->
                            <li>
                                <a href="<?php echo base_url().'index.php?/UltimosNumeros/index'?>"><i class="fa fa-pencil-square-o"></i> Ultimos Numeros</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="panel-heading"><?php echo $titulo; ?></h3>
            </div>
        </div>
        <div class="row">
            <div class="panel panel-default">
                <?php echo $_content ;?>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url().'assets/js/bootstrap.bundle.min.js';?>"></script>
</body>
</html>