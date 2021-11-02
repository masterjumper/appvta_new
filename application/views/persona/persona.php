<div class="container">
    <body>
    <div class="sign-up-form form">
        <?php echo form_open(base_url().'persona/save/'); ?>
        <?php foreach($persona as $item) { ?>
            <input class="form-input" type="input" name="idPersona" readonly hidden="true" value=<?php echo $item->idPersona;?>>
            <label class="form-label-wrapper">
                <p class="form-label">Persona</p>
                <input class="form-input" type="input" name="Nombre" required value="<?php echo (set_value('Nombre'))? set_value('Nombre'): $item->Nombre ; ?>">
            </label>
            <div class="stat-cards-info__profit danger">
                <?php echo form_error('Nombre'); ?>
            </div>
            <label class="form-label-wrapper">
                <p class="form-label">Apellido</p>
                <input class="form-input" type="input" name="Apellido" required value="<?php echo (set_value('Apellido'))? set_value('Apellido'): $item->Apellido ; ?>">
            </label>
            <div class="stat-cards-info__profit danger">
                <?php echo form_error('Nombre'); ?>
            </div>
            <label class="form-label-wrapper">
                <p class="form-label">Mail </p>
                <input class="form-input" type="input"  name="mail" value="<?php echo (set_value('mail'))? set_value('mail'): $item->mail ; ?>">
            </label>
            <div class="stat-cards-info__profit danger">
                <?php echo form_error('mail'); ?>
            </div>
            <label class="form-label-wrapper">
                <p class="form-label">Celular </p>
                <input class="form-input" type="input"  name="WP" value="<?php echo (set_value('WP'))? set_value('WP'): $item->WP ; ?>">
            </label>
            <div class="stat-cards-info__profit danger">
                <?php echo form_error('WP'); ?>
            </div>
        <?php } ?>
        <button class="form-btn primary-default-btn transparent-btn">Guardar</button>
        <?=form_close()?>
        <p class="form-label"></p>
        <a href=<?php echo (base_url()."persona/index/");?>>
            <submit type="submit" class="form-btn primary-default-btn transparent-btn"> Cancelar</submit>
        </a>
    </div>
    </body>
</div>
