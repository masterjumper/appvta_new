<div class="container">
    <body>
    <div class="sign-up-form form">
        <?php echo form_open(base_url().'alimentacion/save/'); ?>
        <label class="form-label-wrapper">
            <p class="form-label">Sistema de Alimentacion </p>
            <input class="form-input" type="input" required name="AlimentacionDescripcion" value="<?php echo set_value('AlimentacionDescripcion') ; ?>">
        </label>
        <div class="stat-cards-info__profit danger">
            <?php echo form_error('AlimentacionDescripcion'); ?>
        </div>
        <button class="form-btn primary-default-btn transparent-btn">Guardar</button>
        <?=form_close()?>
        <p class="form-label"></p>
        <a href=<?php echo (base_url()."alimentacion/index/");?>>
            <submit type="submit" class="form-btn primary-default-btn transparent-btn"> Cancelar</submit>
        </a>
    </div>
    </body>
</div>