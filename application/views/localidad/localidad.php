<div class="container">
    <body>
    <div class="sign-up-form form">
        <?php echo form_open(base_url().'localidad/save/'); ?>
        <?php foreach($localidad as $item) { ?>
            <input class="form-input" type="input" name="idLocalidad" readonly hidden="true" value=<?php echo $item->idLocalidad;?>>
            <label class="form-label-wrapper">
                <p class="form-label">Localidad</p>
                <input class="form-input" type="input" name="LocalidadDescripcion" required value="<?php echo (set_value('LocalidadDescripcion'))? set_value('LocalidadDescripcion'): $item->LocalidadDescripcion ; ?>">
            </label>
            <div class="stat-cards-info__profit danger">
                <?php echo form_error('LocalidadDescripcion'); ?>
            </div>
            <label class="form-label-wrapper">
                <p class="form-label">Latitud </p>
                <input class="form-input" type="input" required name="LocalidadLatitud" value="<?php echo (set_value('LocalidadLatitud'))? set_value('LocalidadLatitud'): $item->LocalidadLatitud ; ?>">
            </label>
            <div class="stat-cards-info__profit danger">
                <?php echo form_error('LocalidadLatitud'); ?>
            </div>
            <label class="form-label-wrapper">
                <p class="form-label">Longitud </p>
                <input class="form-input" type="input" required name="LocalidadLongitud" value="<?php echo (set_value('LocalidadLongitud'))? set_value('LocalidadLongitud'): $item->LocalidadLongitud ; ?>">
            </label>
            <div class="stat-cards-info__profit danger">
                <?php echo form_error('LocalidadLongitud'); ?>
            </div>
            <label class="form-label-wrapper">
                <p class="form-label">Provincia</p>
                <select class="form-input" id="idProvincia" name="idProvincia">
                    <?php foreach($provincias as $provincia){ ?>
                    <?php if ($item->idProvincia == $provincia->idProvincia){ ?>
                        <option selected value=<?php echo $provincia->idProvincia;?>><?php echo $provincia->ProvinciaDescripcion; ?></option>
                    <?php }else{ ?>
                        <option value=<?php echo $provincia->idProvincia;?>><?php echo $provincia->ProvinciaDescripcion; ?></option>
                    <?php }}?>
                </select>
            </label>
        <?php } ?>
        <button class="form-btn primary-default-btn transparent-btn">Guardar</button>
        <?=form_close()?>
        <p class="form-label"></p>
        <a href=<?php echo (base_url()."localidad/index/");?>>
            <submit type="submit" class="form-btn primary-default-btn transparent-btn"> Cancelar</submit>
        </a>
    </div>
    </body>
</div>
