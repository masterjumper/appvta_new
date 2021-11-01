<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo APPNAME ?></title>
    <!-- Bootstrap FONT AWESOME -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->
    <link rel="stylesheet" href="<?php echo base_url().'assets/font-awesome-4.7.0/css/font-awesome.min.css';?>">

    <!-- Favicon -->
    <!--<link rel="shortcut icon" href="<?php //echo base_url().'assets/img/svg/logo.svg';?>" type="image/x-icon">-->
    <!-- Custom styles -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/style.min.css'; ?>">
    <!-- Custom ALERTS scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
<div class="layer"></div>
<!-- ! Body -->
<a class="skip-link sr-only" href="#skip-target">Skip to content</a>
<div class="page-flex">
    <!-- ! Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-start">
            <div class="sidebar-head">
                <a href="<?php echo base_url().'login/inicio'; ?>" class="logo-wrapper" title="Home">
                    <span class="sr-only">Inicio</span>
                    <span class="icon logo" aria-hidden="true"></span>
                    <div class="logo-text">
                        <span class="logo-title">Agenda</span>
                        <span class="logo-subtitle">BBE Desarrollo</span>
                    </div>
                </a>
                <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                    <span class="sr-only">Toggle menu</span>
                    <span class="icon menu-toggle" aria-hidden="true"></span>
                </button>
            </div>
            <div class="sidebar-body">
                <ul class="sidebar-body-menu">
                    <li>
                        <a href="<?php echo base_url().'inicio'; ?>"><i class="fa fa-home" style="font-size: 24px">&nbsp;</i> Inicio</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'Planta/predeterminado'?>">
                            <i class="fa fa-industry" style="font-size: 24px">&nbsp;</i></span>Plantas
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'Grupocrea/predeterminado'?>">
                            <i class="fa fa-users" style="font-size: 24px">&nbsp;</i></span>Grupos CREA
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'Alimentacion/predeterminado'?>">
                            <i class="fa fa-envira" style="font-size: 24px">&nbsp;</i></span>Sist. de Alimentacion
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'produccion/predeterminado'?>">
                            <i class="fa fa-tasks" style="font-size: 24px">&nbsp;</i></span>Sist. de Produccion
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'biotipoanimal/predeterminado'?>">
                            <i class="fa fa-bullseye" style="font-size: 24px">&nbsp;</i></span>Biotipo Animal
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'destino/predeterminado'?>">
                            <i class="fa fa-plane" style="font-size: 24px">&nbsp;</i></span>Destino
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'provincia/predeterminado'?>">
                            <i class="fa fa-flag-o" style="font-size: 24px">&nbsp;</i></span>Provincias
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'localidad/predeterminado'?>">
                            <i class="fa fa-location-arrow" style="font-size: 24px">&nbsp;</i></span>Localidades
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'rol/predeterminado'?>">
                            <i class="fa fa-asterisk" style="font-size: 24px">&nbsp;</i></span>Roles
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'persona/predeterminado'?>">
                            <i class="fa fa-user" style="font-size: 24px">&nbsp;</i></span>Personas
                        </a>
                    </li>

                    <li>
                        <a class="show-cat-btn" href="##">
                            <span class="icon document" aria-hidden="true"></span>Posts
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                        </a>
                        <ul class="cat-sub-menu">
                            <li>
                                <a href="posts.html">All Posts</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <span class="system-menu__title">Sistema</span>
                <ul class="sidebar-body-menu">
                    <li>
                        <a href="appearance.html"><span class="icon edit" aria-hidden="true"></span>Appearance</a>
                        <a href="<?php echo base_url().'Grupo/predeterminado'?>">
                            <i class="fa fa-users" style="font-size: 24px">&nbsp;</i></span>
                            Grupos de Usuarios</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url().'Usuario/predeterminado'?>">
                            <i class="fa fa-user" style="font-size: 24px">&nbsp;</i></span>
                             Usuarios</a>
                    </li>

                </ul>
            </div>
        </div>
    </aside>
    <div class="main-wrapper">
        <!-- ! Main nav -->
        <nav class="main-nav--bg">
            <div class="container main-nav">
                <div class="main-nav-start">
                    <div class="search-wrapper">
                    </div>
                    <div class="container">
                        <h2 class="main-title"><?php echo $titulo; ?></h2>
                    </div>
                </div>
                <div class="main-nav-end">
                    <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                        <span class="sr-only"></span>
                        <span class="icon menu-toggle--gray" aria-hidden="true"></span>
                    </button>
                    <button class="theme-switcher gray-circle-btn" type="button" title="Switch theme">
                        <span class="sr-only">Cambiar de Tema</span>
                        <i class="sun-icon" data-feather="sun" aria-hidden="true"></i>
                        <i class="moon-icon" data-feather="moon" aria-hidden="true"></i>
                    </button>
                    <div class="nav-user-wrapper">
                        <button href="##" class="nav-user-btn dropdown-btn" title="My profile" type="button">
                              <span class="sr-only">My profile</span>
                              <span class="nav-user-img">
                                <picture><source srcset="<?php echo base_url().'assets/img/avatar/avatar-illustrated-02.webp';?>" type="image/webp"><img src="<?php echo base_url().'assets/img/avatar/avatar-illustrated-02.png';?>" alt="User name"></picture>
                              </span>
                        </button>
                        <ul class="users-item-dropdown nav-user-dropdown dropdown">
                            <li><a href="<?php echo base_url().'PerfilUsuario/index'?>">
                                    <i data-feather="user" aria-hidden="true"></i>
                                    <span>Profile</span>
                                </a>
                            </li>
                            <li><a class="danger" href="<?php echo base_url().'Login/logout'?>">
                                    <i data-feather="log-out" aria-hidden="true"></i>
                                    <span>Cerrar Sesion</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!-- ! Main -->
        <main class="main users chart-page" id="skip-target">
<!--
            <div class="container">
                <h2 class="main-title"><?php //echo $titulo; ?></h2>
            </div>
-->
            <div class="col-lg-10">
                <div class="row">
                    <div class="panel panel-default">
                        <?php echo $_content ;?>
                    </div>
                </div>
             </div>
        </main>
    </div>
</div>
<!-- Chart library -->
<script src="<?php echo base_url().'assets/plugins/chart.min.js'; ?>"></script>
<!-- Icons library -->
<script src="<?php echo base_url().'assets/plugins/feather.min.js';?>"></script>
<!-- Custom scripts -->
<script src="<?php echo base_url().'assets/js/script.js';?>"></script>
<!-- jquery scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</body>
</html>