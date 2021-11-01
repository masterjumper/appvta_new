<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
<div class="container">
    <body>
    <div class="sign-up-form form">
        <?php echo form_open(base_url().'PerfilUsuario/confirmar/'); ?>
        <?php foreach($usuario as $item) { ?>
            <input class="form-input" type="input" name="usuid" readonly hidden="true" value=<?php echo $item->usuid;?>>
            <label class="form-label-wrapper">
                <p class="form-label">Contraseña </p>

                <p><input class="form-input" type="password" required  id ="usupass" name="usupass"  value="<?php echo (set_value('usupass'))? set_value('usupass'): $item->usupass ; ?>">
                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                </p>
            </label>
            <label class="form-label-wrapper">
                <p class="form-label">Confirme Contraseña</p>
                <p><input class="form-input" type="password" required id="confirmusupass" name="confirmusupass"  value="<?php echo (set_value('confirmusupass'))? set_value('confirmusupass'): $item->usupass; ?>" >
                    <i class="bi bi-eye-slash" id="togglePasswordConfirm"></i>
                </p>
            </label>
            <div class="stat-cards-info__profit danger">
                <?php echo form_error('usupass'); ?>
            </div>
            <label class="form-label-wrapper">
                <p class="form-label">Legajo</p>
                <input class="form-input" type="input" required name="usuleg" value="<?php echo $item->usuleg;?>">
                <div class="stat-cards-info__profit danger">
                    <?php echo form_error('usuleg'); ?>
                </div>
            </label>
            <label class="form-label-wrapper">
                <p class="form-label">Nombre</p>
                <input class="form-input" type="input" required name="usunom" value="<?php echo $item->usunom;?>">
                <div class="stat-cards-info__profit danger">
                    <?php echo form_error('usunom'); ?>
                </div>
            </label>
            <label class="form-label-wrapper">
                <p class="form-label">Apellido</p>
                <input class="form-input" type="input" required name="usuape" value="<?php echo $item->usuape;?>">
                <div class="stat-cards-info__profit danger">
                    <?php echo form_error('usuape'); ?>
                </div>
            </label>
            <label class="form-label-wrapper">
                <p class="form-label">Correo Electronico</p>
                <input class="form-input" type="email" name="usumai" value="<?php echo $item->usumai;?>">
                <div class="stat-cards-info__profit danger">
                    <?php echo form_error('usumai'); ?>
                </div>
            </label>
        <?php } ?>
        <button class="form-btn primary-default-btn transparent-btn">Guardar</button>
        <?=form_close()?>
        <p class="form-label"></p>
        <a href=<?php echo (base_url()."Login/inicio/");?>>
            <submit type="submit" class="form-btn primary-default-btn transparent-btn"> Cancelar</submit>
        </a>
    </div>
    </body>
</div>

<script>
const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#usupass');

togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'input' : 'password';
    password.setAttribute('type', type);
    // toggle the eye / eye slash icon
    this.classList.toggle('bi-eye');
});

const togglePasswordconfirm = document.querySelector('#togglePasswordConfirm');
const confirmpassword = document.querySelector('#confirmusupass');

togglePasswordconfirm.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = confirmpassword.getAttribute('type') === 'password' ? 'input' : 'password';
    confirmpassword.setAttribute('type', type);
    // toggle the eye / eye slash icon
    this.classList.toggle('bi-eye');
});
</script>