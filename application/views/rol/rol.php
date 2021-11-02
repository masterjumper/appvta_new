<div class="container">
    <body>
    <div class="sign-up-form form">
        <?php echo form_open(base_url().'rol/save/'); ?>
        <?php foreach($rol as $item) { ?>
            <input class="form-input" type="input" name="idRol" readonly hidden="true" value=<?php echo $item->idRol;?>>
            <label class="form-label-wrapper">
                <p class="form-label">Rol</p>
                <input class="form-input" type="input" name="RolDescripcion" required value="<?php echo (set_value('RolDescripcion'))? set_value('RolDescripcion'): $item->RolDescripcion ; ?>">
            </label>
            <div class="stat-cards-info__profit danger">
                <?php echo form_error('RolDescripcion'); ?>
            </div>
        <?php } ?>
        <button class="form-btn primary-default-btn transparent-btn">Guardar</button>
        <?=form_close()?>
        <p class="form-label"></p>
        <a href=<?php echo (base_url()."rol/index/");?>>
            <submit type="submit" class="form-btn primary-default-btn transparent-btn"> Cancelar</submit>
        </a>
    </div>
    </body>
</div>
