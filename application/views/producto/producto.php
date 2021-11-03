<div class="container">
    <body>
    <div class="sign-up-form form">
        <?php echo form_open(base_url().'produccion/save/'); ?>
        <?php foreach($produccion as $item) { ?>
            <input class="form-input" type="input" name="idSistemaProduccion" readonly hidden="true" value=<?php echo $item->idSistemaProduccion;?>>
            <label class="form-label-wrapper">
                <p class="form-label">Sistema de Produccion</p>
                <input class="form-input" type="input" name="SistemaProduccionDescripcion" required value="<?php echo (set_value('SistemaProduccionDescripcion'))? set_value('SistemaProduccionDescripcion'): $item->SistemaProduccionDescripcion ; ?>">
            </label>
            <div class="stat-cards-info__profit danger">
                <?php echo form_error('SistemaProduccionDescripcion'); ?>
            </div>
        <?php } ?>
        <button class="form-btn primary-default-btn transparent-btn">Guardar</button>
        <?=form_close()?>
        <p class="form-label"></p>
        <a href=<?php echo (base_url()."produccion/index/");?>>
            <submit type="submit" class="form-btn primary-default-btn transparent-btn"> Cancelar</submit>
        </a>
    </div>
    </body>
</div>
