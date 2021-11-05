<div class="container">
    <body>
    <div class="sign-up-form form">
        <?php echo form_open(base_url().'usuario/save/'); ?>
        <?php foreach($usuario as $item) { ?>
            <input class="form-input" type="input" name="usuid" readonly hidden="true" value=<?php echo $item->usuid;?>>
            <label class="form-label-wrapper">
                <p class="form-label">Usuario</p>
                <input class="form-input" type="input" readonly name="usuuser" value="<?php echo $item->usuuser;?>">
            </label>
            <label class="form-label-wrapper">
                <p class="form-label">Contraseña</p>
                <input class="form-input" type="input" required name="usupass"  value="<?php echo $item->usupass;?>">
            </label>
            <label class="form-label-wrapper">
                <p class="form-label">Nombre</p>
                <input class="form-input" type="input" required name="usunom" value="<?php echo $item->usunom;?>">
            </label>
            <label class="form-label-wrapper">
                <p class="form-label">Apellido</p>
                <input class="form-input" type="input" required name="usuape" value="<?php echo $item->usuape;?>">
            </label>
            <label class="form-label-wrapper">
                <p class="form-label">Correo Electronico</p>
                <input class="form-input" type="email" name="usumai" value="<?php echo $item->usumai;?>">
            </label>

            <label class="form-label-wrapper">
                <p class="form-label">Grupo</p>
                <select class="form-input" id="gruid" name="gruid">
                    <?php foreach($grupos as $grupo){ ?>
                    <?php if($grupo->gruid == $item->gruid ){?>
                        <option selected value=<?php echo $grupo->gruid;?>><?php echo $grupo->grudsc; ?></option>
                    <?php }else{?>
                        <option value=<?php echo $grupo->gruid;?>><?php echo $grupo->grudsc; ?></option>
                    <?php }}?>
                </select>
            </label>

            <label class="form-label-wrapper">
                <p class="form-label">Estado</p>
                <div class="form-group">
                    <select class="form-input" id="usuest" name="usuest">
                        <?php if ($item->usuest == 1){ ?>
                            <option selected value = '1'><?php echo 'Habilitado' ?></option>
                            <option value = '2'><?php echo 'Deshabilitado' ?></option>
                        <?php }else{ ?>
                            <option  value = '1'><?php echo 'Habilitado' ?></option>
                            <option selected value = '2'><?php echo 'Deshabilitado' ?></option>
                        <?php }?>
                    </select>
                </div>
            </label>
        <?php } ?>
        <button class="form-btn primary-default-btn transparent-btn">Guardar</button>
        <?=form_close()?>
        <p class="form-label"></p>
        <a href=<?php echo (base_url()."usuario/index/");?>>
            <submit type="submit" class="form-btn primary-default-btn transparent-btn"> Cancelar</submit>
        </a>
    </div>
    </body>
</div>