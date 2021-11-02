<div class="container">
    <body>
    <div class="sign-up-form form">
        <?php echo form_open(base_url().'biotipoanimal/save/'); ?>
        <?php foreach($biotipoanimal as $item) { ?>
            <input class="form-input" type="input" name="idBiotipoAnimal" readonly hidden="true" value=<?php echo $item->idBiotipoAnimal;?>>
            <label class="form-label-wrapper">
                <p class="form-label">Biotipo Animal</p>
                <input class="form-input" type="input" name="BiotipoAnimalDescripcion" required value="<?php echo (set_value('BiotipoAnimalDescripcion'))? set_value('BiotipoAnimalDescripcion'): $item->BiotipoAnimalDescripcion ; ?>">
            </label>
            <div class="stat-cards-info__profit danger">
                <?php echo form_error('BiotipoAnimalDescripcion'); ?>
            </div>
        <?php } ?>
        <button class="form-btn primary-default-btn transparent-btn">Guardar</button>
        <?=form_close()?>
        <p class="form-label"></p>
        <a href=<?php echo (base_url()."biotipoanimal/index/");?>>
            <submit type="submit" class="form-btn primary-default-btn transparent-btn"> Cancelar</submit>
        </a>
    </div>
    </body>
</div>
