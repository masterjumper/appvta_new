<div class="container">
    <body>
    <div class="sign-up-form form">
        <?php echo form_open(base_url().'provincia/save/'); ?>
        <?php foreach($provincia as $item) { ?>
            <input class="form-input" type="input" name="idProvincia" readonly hidden="true" value=<?php echo $item->idProvincia;?>>
            <label class="form-label-wrapper">
                <p class="form-label">Provincia</p>
                <input class="form-input" type="input" name="ProvinciaDescripcion" required value="<?php echo (set_value('ProvinciaDescripcion'))? set_value('ProvinciaDescripcion'): $item->ProvinciaDescripcion ; ?>">
            </label>
            <div class="stat-cards-info__profit danger">
                <?php echo form_error('ProvinciaDescripcion'); ?>
            </div>
        <?php } ?>
        <button class="form-btn primary-default-btn transparent-btn">Guardar</button>
        <?=form_close()?>
        <p class="form-label"></p>
        <a href=<?php echo (base_url()."provincia/index/");?>>
            <submit type="submit" class="form-btn primary-default-btn transparent-btn"> Cancelar</submit>
        </a>
    </div>
    </body>
</div>
