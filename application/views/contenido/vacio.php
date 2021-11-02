<?php
/**
 * Created by PhpStorm.
 * User: smuguerza
 * Date: 07/02/2017
 * Time: 01:04 PM
 */
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    <?php if($this->session->flashdata("success")){ ?>
    Swal.fire({
        position: 'success',
        icon: 'success',
        text: '<?php echo $this->session->flashdata('success'); ?>',
        showConfirmButton: false,
        timer: 1500
    });
    <?php } ?>
</script>
