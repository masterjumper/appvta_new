<div class="container">
    <body>
    <div class="sign-up-form form">
        <?php echo form_open(base_url().'grupo/save/'); ?>
        <?php foreach($grupo as $item) { ?>
            <input class="form-input" type="input" name="gruid" readonly hidden="true" value=<?php echo $item->gruid;?>>
            <!--
            <label class="form-label-wrapper">
                <p class="form-label">ID
                <input class="form-input" type="input" name="gruid" readonly value=<?php// echo $item->gruid;?>>
                </p>
            </label>
            -->
            <label class="form-label-wrapper">
                <p class="form-label">Descripcion</p>
                <input class="form-input" type="input" name="grudsc" value="<?php echo $item->grudsc;?>">
            </label>
            <label class="form-label-wrapper">
                <p class="form-label">Template</p>
                <input class="form-input" type="input" name="grutem" value="<?php echo $item->grutem;?>">
            </label>
        <?php } ?>
        <button class="form-btn primary-default-btn transparent-btn">Guardar</button>
        <?=form_close()?>
        <p class="form-label"></p>
        <a href=<?php echo (base_url()."grupo/index/");?>>
            <submit type="submit" class="form-btn primary-default-btn transparent-btn"> Cancelar</submit>
        </a>
    </div>
    </body>
</div>
