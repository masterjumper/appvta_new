<?php
/**
 * Created by PhpStorm.
 * User: mpucci
 * Date: 30/01/2017
 * Time: 13:16
 */
//include(APPPATH.'/views/templates/header.php')
?>
<html>
<body>
<h1><?php echo $grilla_titulo ?></h1>
<?php echo form_open(base_url())?> <?php//.'index.php?/Usuario/verificar/'); ?>
<table id="tabla1" class="tablaColor">
<thead>
<tr>
    <th class="tablaColor" colspan="10"><?php //echo $grilla_titulo ?></th>
</tr>
<tr>
<td class="tg-6k2t">Id</td>
<td class="tg-6k2t">Descripcion</td>
<td class="tg-6k2t">Valor</td>

</tr>
</thead>
<tbody>
<tr>
<?php
    foreach($datos as $columna){
?>
<td class="tg-yw4l"><?php echo $columna->ult_id; ?></td>
<td class="tg-yw4l"><?php echo $columna->ult_desc; ?></td>
<td class="tg-yw4l"><?php echo $columna->ult_valor; ?></td>
</tr>
<?php }; ?>

</tbody>
</table>
<?=form_close()?>
<? //include(APPPATH. 'views/templates/footer.php')?>
</html>