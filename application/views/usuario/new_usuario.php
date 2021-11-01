<div class="container">
    <body>
    <div class="sign-up-form form">
        <?php echo form_open(base_url().'usuario/save_new/'); ?>
        <label class="form-label-wrapper">
            <p class="form-label">Usuario</p>
            <input class="form-input" type="input" name="usuuser" required value="">
        </label>
        <label class="form-label-wrapper">
            <p class="form-label">Contraseña</p>
            <input class="form-input" type="input" name="usupass" required value="">
        </label>
        <label class="form-label-wrapper">
            <p class="form-label">Legajo</p>
            <input class="form-input" type="input" name="usuleg" value="">
        </label>
        <label class="form-label-wrapper">
            <p class="form-label">Nombre</p>
            <input class="form-input" type="input" name="usunom" required value="">
        </label>
        <label class="form-label-wrapper">
            <p class="form-label">Apellido</p>
            <input class="form-input" type="input" name="usuape" required value="">
        </label>
        <label class="form-label-wrapper">
            <p class="form-label">Correo Electronico</p>
            <input class="form-input" type="email" name="usumai" value="">
        </label>

        <label class="form-label-wrapper">
            <p class="form-label">Grupo</p>
            <select class="form-input" id="gruid" name="gruid">
                <?php foreach($grupos as $grupo){ ?>
                    <option value=<?php echo $grupo->gruid;?>><?php echo $grupo->grudsc; ?></option>
                <?php }?>
            </select>
        </label>

        <label class="form-label-wrapper">
            <p class="form-label">Estado</p>
            <div class="form-group">
                <select class="form-input" id="usuest" name="usuest">
                    <option  selected value='<?php echo '1' ?>'><?php echo 'Habilitado' ?></option>
                    <option  value='<?php echo '2';?>'><?php echo 'Deshabilitado'; ?></option>
                </select>
            </div>
        </label>
        <p class="form-label">&nbsp;</p>
        <button class="form-btn primary-default-btn transparent-btn">Guardar</button>
        <?=form_close()?>
        <p class="form-label"></p>
        <a href=<?php echo (base_url()."usuario/index/");?>>
            <submit type="submit" class="form-btn primary-default-btn transparent-btn"> Cancelar</submit>
        </a>
    </div>
    </body>

</div>