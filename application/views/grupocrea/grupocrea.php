<div class="container">
    <body>
    <div class="sign-up-form form">
        <?php echo form_open(base_url().'grupocrea/save/'); ?>
        <?php foreach($grupocrea as $item) { ?>
            <input class="form-input" type="input" name="idGrupoCREA" readonly hidden="true" value=<?php echo $item->idGrupoCREA;?>>
            <label class="form-label-wrapper">
                <p class="form-label">Descripcion</p>
                <input class="form-input" type="input" name="GrupoCREADescripcion" required value="<?php echo (set_value('GrupoCREADescripcion'))? set_value('GrupoCREADescripcion'): $item->GrupoCREADescripcion ; ?>">
            </label>
            <div class="stat-cards-info__profit danger">
                <?php echo form_error('GrupoCREADescripcion'); ?>
            </div>
        <?php } ?>
        <button class="form-btn primary-default-btn transparent-btn">Guardar</button>
        <?=form_close()?>
        <p class="form-label"></p>
        <a href=<?php echo (base_url()."grupocrea/index/");?>>
            <submit type="submit" class="form-btn primary-default-btn transparent-btn"> Cancelar</submit>
        </a>
    </div>
    </body>
</div>
