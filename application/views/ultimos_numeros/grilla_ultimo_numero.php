<body>
    <form class="form-horizontal" action="#">
        <div class="form-group">
            <div class="col-sm-10">
                <table class="table table-hover" width="50%" table-layout="fixed" white-space="nowrap">
                    <caption> </caption>
                    <thead>
                    <th class="col-xs-2">&nbsp;</th>
                    <th class="col-xs-2">Id</th>
                    <th class="col-xs-8" nowrap="true">Descripcion</th>
                    <th class="col-xs-5" nowrap="true">Valor</th>
                    </thead>
                    <tbody>
                    <?php foreach($ultimo_numero as $ultnro){ ?>
                    <tr>
                        <td class="col-xs-2"><a href=<?php echo base_url().'index.php?/UltimosNumeros/update/'.$ultnro->ultnroid;?>>
                                <submit class="btn btn-info" type="submit">Ver</submit></a>
                        </td>
                        <td class="col-xs-2"><?php echo $ultnro->ultnroid;?></td>
                        <td class="col-xs-8" nowrap="true"><?php echo trim($ultnro->ultnrodsc); ?></td>
                        <td class="col-xs-8" nowrap="true"><?php echo trim($ultnro->ultnroval); ?></td>
                        <td class="col-xs-5" ><a href=<?php echo base_url().'index.php?/UltimosNumeros/delete/'.$ultnro->ultnroid;?>>
                                <submit class="btn btn-danger" type="submit">X</submit></a></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
    <a href=<?php echo base_url().'index.php?/UltimosNumeros/new_ultimos_numeros/';?>>
        <submit class="btn btn-primary" type="submit">Agregar</submit></a>
</body>