<div class="container">
    <body>
    <div class="sign-up-form form">
        <?php echo form_open(base_url().'rol/save/'); ?>
        <label class="form-label-wrapper">
            <p class="form-label">Rol </p>
            <input class="form-input" type="input" required name="RolDescripcion" value="<?php echo set_value('RolDescripcion') ; ?>">
        </label>
        <div class="stat-cards-info__profit danger">
            <?php echo form_error('RolDescripcion'); ?>
        </div>
        <button class="form-btn primary-default-btn transparent-btn">Guardar</button>
        <?=form_close()?>
        <p class="form-label"></p>
        <a href=<?php echo (base_url()."rol/index/");?>>
            <submit type="submit" class="form-btn primary-default-btn transparent-btn"> Cancelar</submit>
        </a>
    </div>
    </body>
</div>