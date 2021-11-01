<div class="container">
    <body>
    <div class="sign-up-form form">
        <?php echo form_open(base_url().'grupo/save_new/'); ?>
        <label class="form-label-wrapper">
            <p class="form-label">Descripcion</p>
            <input class="form-input" type="input" name="grudsc" value="">
        </label>
        <label class="form-label-wrapper">
            <p class="form-label">Template</p>
            <input class="form-input" type="input" name="grutem" value="">
        </label>
        <button class="form-btn primary-default-btn transparent-btn">Guardar</button>
        <?=form_close()?>
        <p class="form-label"></p>
        <a href=<?php echo (base_url()."grupo/index/");?>>
            <submit type="submit" class="form-btn primary-default-btn transparent-btn"> Cancelar</submit>
        </a>
    </div>
    </body>
</div>
