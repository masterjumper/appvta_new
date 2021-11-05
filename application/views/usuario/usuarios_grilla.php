<div class="container">
    <body>
    <?php echo form_open_multipart(base_url().'Usuario/index');?>
    <nav class="users-table table-wrapper">
        <table class="posts-table">
            <tbody>
            <tr>
                <div class="search-wrapper">
                <td>
                    <i data-feather="search" aria-hidden="true"></i>
                    <input type="search" placeholder="Buscar..." id="filtro" name="filtro" onblur="doFiltrar()" >
                </td>
                <td>
                    <div class="form-group">
                        <select class="form-input" id="estado" name="estado" onchange="doCambio()">
                            <option value='3'><?php echo 'Todos'; ?></option>
                            <option <?php echo ($estado == '1') ? 'selected' : '';?> value='1'><?php echo 'Habilitado' ?></option>
                            <option <?php echo ($estado == '2') ? 'selected' : '';?> value='2'><?php echo 'Deshabilitado'; ?></option>
                        </select>
                    </div>
                </td>
                <input type="submit" id="buscar" name="buscar" hidden="true">
                </div>
            </tr>

            </tbody>
        </table>
    </nav>
    <?=form_close()?>
    </body>
    <body>
    <form class="form-horizontal" action="#">
        <nav class="users-table table-wrapper">
            <table class="posts-table">
                <thead>
                <tr class="users-table-info">
                    <th>
                        &nbsp;
                    </th>
                    <th>Id</th>
                    <th nowrap="true">Usuario</th>                    
                    <th nowrap="true">Nombre</th>
                    <th nowrap="true">Apellido</th>
                    <th nowrap="true">Grupo</th>
                    <th nowrap="true">Estado</th>
                    <th nowrap="true">Acciones</th>
                    <th>
                        <a href="<?php echo base_url().'usuario/new_usuario/';?>" class="nav-user-btn dropdown-btn" title="Agregar" type="button">
                            <span class="sr-only"></span>
                            <span class="nav-user-img">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                     <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                     <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                 </svg>
                            </span>
                        </a>
                    </th>
                    <th>
                        <span class="p-relative">
                        <button class="dropdown-btn transparent-btn" type="button" title="Lista">
                            <!--<div class="sr-only">Acciones</div>-->
                            <span class="nav-user-img">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
                                     <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                 </svg>
                              </span>
                        </button>
                        <ul class="users-item-dropdown dropdown">
                            <li><a href="<?php echo base_url().'usuario/porpagina/10';?>" >10</a></li>
                            <li><a href="<?php echo base_url().'usuario/porpagina/20';?>" >20</a></li>
                            <li><a href="<?php echo base_url().'usuario/porpagina/0';?>" >Todos</a></li>
                        </ul>
                      </span>
                    </th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    &nbsp;
                </tr>
                <?php foreach($usuarios as $usuario){ ?>
                    <tr class="">
                        <td> </td>
                        <td><?php echo $usuario->usuid;?></td>
                        <td><?php echo $usuario->usuuser ;?></td>                        
                        <td><?php echo $usuario->usunom; ?></td>
                        <td><?php echo $usuario->usuape; ?></td>
                        <td><?php echo $usuario->grudsc; ?></td>
                        <td><?php if($usuario->usuest == 1){; ?>
                            <span class="badge-active">Habilitado</span>
                            <?php }else{ ?>
                                <span class="badge-pending">Deshabilitado</span>
                            <?php }?>
                        </td>
                        <td>
                          <span class="p-relative">
                            <button class="dropdown-btn transparent-btn" type="button" title="Acciones">
                                <div class="sr-only">Acciones</div>
                                <i data-feather="more-horizontal" aria-hidden="true"></i>
                            </button>
                            <ul class="users-item-dropdown dropdown">
                                <li><a href="<?php echo base_url().'usuario/update/'.$usuario->usuid;?>">Editar</a></li>
                                <li><a href="<?php echo base_url().'usuario/borrar/'.$usuario->usuid;?>">Eliminar</a></li>
                            </ul>
                          </span>
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <nav aria-label="Search results pages">
                <?php echo $links; ?>
            </nav>
        </nav>
    </form>
    </body>
</div>
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

    <?php if($this->session->flashdata("delete")){ ?>
    Swal.fire({
        position: 'error',
        title: 'Seguro de Eliminar este Registro?',
        text: "No se podra Revertir!",
        icon: 'error',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'NO',
        confirmButtonText: 'SI'
    }).then((result)=>{
        if(result.isConfirmed){
        $.ajax({
            type:"DELETE",
            url: "<?php echo base_url().'usuario/delete/'.$this->session->flashdata('delete');?>",
            success:function(datos){
                Swal.fire({
                    position: 'success',
                    icon: 'success',
                    text: 'Se Elimino con Exito',
                    showConfirmButton: false,
                    timer: 1500
                });
                window.location = "<?php echo base_url().'usuario';?>";
            },
            error: function() {
                Swal.fire({
                    position: 'error',
                    icon: 'error',
                    text: 'Ocurrio un Problema',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        });
    }
    })
    <?php } ?>

    function doFiltrar() {
        document.getElementById("buscar").click();
    }

    function doCambio() {
        document.getElementById("buscar").click();
    }

</script>




