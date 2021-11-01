<body>
    <table class="table table-hover" table-layout="fixed"  white-space="nowrap">
        <?php echo form_open(base_url().'index.php?/UltimosNumeros/save/'); ?>
        <?php foreach($ultimo_numero as $ult) { ?>
            <tr>
                <td  class="col-xs-5">Id</td>
                <td><input class="form-control" type="input" name="ultnroid" readonly value=<?php echo $ult->ultnroid;?>></td>
            </tr>
            <tr>
                <td class="col-xs-5">Descripcion</td>
                <td><input class="form-control" type="input" name="ultnrodsc" value="<?php echo $ult->ultnrodsc;?>"></td>
            </tr>
            <tr>
                <td class="col-xs-5">Valor (entero)</td>
                <td><input class="form-control" type="input" name="ultnroval" value="<?php echo $ult->ultnroval;?>"></td>
            </tr>
        <?php } ?>
        <tr>
            <td><input type="submit" class="btn btn-primary" value="Guardar" />
                <?=form_close()?>
                <a href=<?php echo (base_url()."index.php?/UltimosNumeros/index/");?>>
                    <submit type="submit" class="btn btn-danger"> Cancelar</submit></a>
            </td>
        </tr>
    </table>
</body>
