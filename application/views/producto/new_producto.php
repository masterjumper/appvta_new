<div class="container">
    <body>
    <div class="sign-up-form form">
        <?php echo form_open(base_url().'producto/save/'); ?>
        <label class="form-label-wrapper">
            <p class="form-label">Codigo </p>
            <input class="form-input" type="input"  name="procodbar" value="<?php echo set_value('procodbar') ; ?>">
        </label>
        <div class="stat-cards-info__profit danger">
            <?php echo form_error('procodbar'); ?>
        </div>
        <label class="form-label-wrapper">
            <p class="form-label">Producto </p>
            <input class="form-input" type="input" required name="prodsc" value="<?php echo set_value('prodsc') ; ?>">
        </label>
        <div class="stat-cards-info__profit danger">
            <?php echo form_error('prodsc'); ?>
        </div>
        <label class="form-label-wrapper">
            <p class="form-label">Importe </p>
            <input class="form-input" type="input" required name="proimp" value="<?php echo set_value('proimp') ; ?>">
        </label>
        <div class="stat-cards-info__profit danger">
            <?php echo form_error('proimp'); ?>
        </div>
        <button class="form-btn primary-default-btn transparent-btn">Guardar</button>
        <?=form_close()?>
        <p class="form-label"></p>
        <a href=<?php echo (base_url()."producto/index/");?>>
            <submit type="submit" class="form-btn primary-default-btn transparent-btn"> Cancelar</submit>
        </a>
    </div>
    </body>
</div>