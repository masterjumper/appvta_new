<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo APPNAME; ?> | Ingresar</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url().'assets/img/svg/logo.svg';?>" type="image/x-icon">
    <!-- Custom styles -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/style.min.css';?>">
</head>
<body>
<div class="layer"></div>
<main class="page-center">
    <article class="sign-up">
        <p class="sign-up__subtitle"><?php echo APPNAME; ?></p>

        <h1 class="sign-up__title">Bienvenido!</h1>
        <p class="sign-up__subtitle">Registrate con tu cuenta para continuar</p>
            <div class="sign-up-form form">
                <?php echo form_open(base_url().'login'); ?>
                <label class="form-label-wrapper" for="Usu">
                    <p class="form-label">Usuario</p>
                        <input type="text" class="form-input" required  id="usuario" name="usuario"   placeholder="ingrese su usuario"  value="<?php echo set_value('usuario'); ?>">
                </label>

                <label class="form-label-wrapper" for="pwd">
                        <p class="form-label">Contraseña:</p>
                            <input type="password" class="form-control" required id="password" name="password" placeholder="ingrese su contraseña" value="<?php echo set_value('password'); ?>">
                </label>

                    <div class="stat-cards-info__profit danger">
                            <?php echo form_error('usuario'); ?>
                            <?php echo form_error('password'); ?>
                    </div>
                <!--<a class="link-info forget-link" href="##">Forgot your password?</a>
                <label class="form-checkbox-wrapper">
                    <input class="form-checkbox" type="checkbox" required>
                    <span class="form-checkbox-label">Remember me next time</span>
                </label>-->
                <p class="form-label">&nbsp;</p>
                <button class="form-btn primary-default-btn transparent-btn">Ingresar</button>
                <p class="form-label">&nbsp;</p>

                <?php echo form_close() ?>
            </div>
    </article>
</main>
<!-- Chart library -->
<script src="<?php echo base_url().'assets/plugins/chart.min.js';?>"></script>
<!-- Icons library -->
<script src="<?php echo base_url().'assets/plugins/feather.min.js';?>"></script>
<!-- Custom scripts -->
<script src="<?php echo base_url().'assets/js/script.js';?>"></script>
</body>

</html>