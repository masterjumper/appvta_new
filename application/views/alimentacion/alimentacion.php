<div class="container">
    <body>
    <div class="sign-up-form form">
        <?php echo form_open(base_url().'alimentacion/save/'); ?>
        <?php foreach($alimentacion as $item) { ?>
            <input class="form-input" type="input" name="idAlimentacion" readonly hidden="true" value=<?php echo $item->idAlimentacion;?>>
            <label class="form-label-wrapper">
                <p class="form-label">Descripcion</p>
                <input class="form-input" type="input" name="AlimentacionDescripcion" required value="<?php echo (set_value('AlimentacionDescripcion'))? set_value('AlimentacionDescripcion'): $item->AlimentacionDescripcion ; ?>">
            </label>
            <div class="stat-cards-info__profit danger">
                <?php echo form_error('AlimentacionDescripcion'); ?>
            </div>
        <?php } ?>
        <button class="form-btn primary-default-btn transparent-btn">Guardar</button>
        <?=form_close()?>
        <p class="form-label"></p>
        <a href=<?php echo (base_url()."alimentacion/index/");?>>
            <submit type="submit" class="form-btn primary-default-btn transparent-btn"> Cancelar</submit>
        </a>
    </div>
    </body>
</div>
