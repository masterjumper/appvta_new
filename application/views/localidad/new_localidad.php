<div class="container">
    <body>
    <div class="sign-up-form form">
        <?php echo form_open(base_url().'localidad/save/'); ?>
        <label class="form-label-wrapper">
            <p class="form-label">Localidad </p>
            <input class="form-input" type="input" required name="LocalidadDescripcion" value="<?php echo set_value('LocalidadDescripcion') ; ?>">
        </label>
        <div class="stat-cards-info__profit danger">
            <?php echo form_error('LocalidadDescripcion'); ?>
        </div>
        <label class="form-label-wrapper">
            <p class="form-label">Latitud </p>
            <input class="form-input" type="input" required name="LocalidadLatitud" value="<?php echo set_value('LocalidadLatitud') ; ?>">
        </label>
        <div class="stat-cards-info__profit danger">
            <?php echo form_error('LocalidadLatitud'); ?>
        </div>
        <label class="form-label-wrapper">
            <p class="form-label">Longitud </p>
            <input class="form-input" type="input" required name="LocalidadLongitud" value="<?php echo set_value('LocalidadLongitud') ; ?>">
        </label>
        <div class="stat-cards-info__profit danger">
            <?php echo form_error('LocalidadLongitud'); ?>
        </div>
        <label class="form-label-wrapper">
            <p class="form-label">Provincia</p>
            <select class="form-input" id="idProvincia" name="idProvincia">
                <?php foreach($provincias as $provincia){ ?>
                    <option value=<?php echo $provincia->idProvincia;?>><?php echo $provincia->ProvinciaDescripcion; ?></option>
                <?php }?>
            </select>
        </label>
        <button class="form-btn primary-default-btn transparent-btn">Guardar</button>
        <?=form_close()?>
        <p class="form-label"></p>
        <a href=<?php echo (base_url()."localidad/index/");?>>
            <submit type="submit" class="form-btn primary-default-btn transparent-btn"> Cancelar</submit>
        </a>
    </div>
    </body>
</div>