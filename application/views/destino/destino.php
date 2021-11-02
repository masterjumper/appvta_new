<div class="container">
    <body>
    <div class="sign-up-form form">
        <?php echo form_open(base_url().'destino/save/'); ?>
        <?php foreach($destino as $item) { ?>
            <input class="form-input" type="input" name="idDestino" readonly hidden="true" value=<?php echo $item->idDestino;?>>
            <label class="form-label-wrapper">
                <p class="form-label">Descripcion</p>
                <input class="form-input" type="input" name="DestinoDescripcion" required value="<?php echo (set_value('DestinoDescripcion'))? set_value('DestinoDescripcion'): $item->Destinodescripcion ; ?>">
            </label>
            <div class="stat-cards-info__profit danger">
                <?php echo form_error('DestinoDescripcion'); ?>
            </div>
        <?php } ?>
        <button class="form-btn primary-default-btn transparent-btn">Guardar</button>
        <?=form_close()?>
        <p class="form-label"></p>
        <a href=<?php echo (base_url()."destino/index/");?>>
            <submit type="submit" class="form-btn primary-default-btn transparent-btn"> Cancelar</submit>
        </a>
    </div>
    </body>
</div>
