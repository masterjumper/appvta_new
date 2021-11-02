<div class="container">
    <body>
    <div class="sign-up-form form">
        <?php echo form_open(base_url().'persona/save/'); ?>
        <label class="form-label-wrapper">
            <p class="form-label">Nombre </p>
            <input class="form-input" type="input" required name="Nombre" value="<?php echo set_value('Nombre') ; ?>">
        </label>
        <div class="stat-cards-info__profit danger">
            <?php echo form_error('Nombre'); ?>
        </div>
        <label class="form-label-wrapper">
            <p class="form-label">Apellido </p>
            <input class="form-input" type="input" required name="Apellido" value="<?php echo set_value('Apellido') ; ?>">
        </label>
        <div class="stat-cards-info__profit danger">
            <?php echo form_error('Apellido'); ?>
        </div>
        <label class="form-label-wrapper">
            <p class="form-label">Mail </p>
            <input class="form-input" type="input"  name="mail" value="<?php echo set_value('mail') ; ?>">
        </label>
        <div class="stat-cards-info__profit danger">
            <?php echo form_error('mail'); ?>
        </div>
        <label class="form-label-wrapper">
            <p class="form-label">Celular </p>
            <input class="form-input" type="input"  name="WP" value="<?php echo set_value('WP') ; ?>">
        </label>
        <div class="stat-cards-info__profit danger">
            <?php echo form_error('WP'); ?>
        </div>
        <button class="form-btn primary-default-btn transparent-btn">Guardar</button>
        <?=form_close()?>
        <p class="form-label"></p>
        <a href=<?php echo (base_url()."persona/index/");?>>
            <submit type="submit" class="form-btn primary-default-btn transparent-btn"> Cancelar</submit>
        </a>
    </div>
    </body>
</div>