<div class="container">
    <body>
    <?php echo form_open_multipart(base_url().'persona/index');?>
    <nav class="users-table table-wrapper">
        <table class="posts-table">
            <tbody>
            <tr>
                <div class="search-wrapper">
                    <td>
                        <i data-feather="search" aria-hidden="true"></i>
                        <input type="search" placeholder="Buscar..." id="filtro" name="filtro" onblur="doFiltrar()" >
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
                    <th nowrap="true">Nombre</th>
                    <th nowrap="true">Apellido</th>
                    <th nowrap="true">Mail</th>
                    <th nowrap="true">Celular</th>
                    <th nowrap="true">Acciones</th>
                    <th>
                        <a href="<?php echo base_url().'persona/new_persona/';?>" class="nav-user-btn dropdown-btn" title="Agregar" type="button">
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
                            <li><a href="<?php echo base_url().'persona/porpagina/10';?>" >10</a></li>
                            <li><a href="<?php echo base_url().'persona/porpagina/20';?>" >20</a></li>
                            <li><a href="<?php echo base_url().'persona/porpagina/0';?>" >Todos</a></li>
                        </ul>
                      </span>
                    </th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    &nbsp;
                </tr>
                <?php foreach($personas as $persona){ ?>
                    <tr class="">
                        <td> </td>
                        <td><?php echo $persona->idPersona;?></td>
                        <td><?php echo $persona->Nombre ;?></td>
                        <td><?php echo $persona->Apellido ;?></td>
                        <td><?php echo $persona->mail ;?></td>
                        <td><?php echo $persona->WP ;?></td>
                        <td>
                          <span class="p-relative">
                            <button class="dropdown-btn transparent-btn" type="button" title="Acciones">
                                <div class="sr-only">Acciones</div>
                                <i data-feather="more-horizontal" aria-hidden="true"></i>
                            </button>
                            <ul class="users-item-dropdown dropdown">
                                <li><a href="<?php echo base_url().'persona/update/'.$persona->idPersona;?>">Editar</a></li>
                                <li><a href="<?php echo base_url().'persona/borrar/'.$persona->idPersona;?>">Eliminar</a></li>
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
            url: "<?php echo base_url().'persona/delete/'.$this->session->flashdata('delete');?>",
            success:function(datos){
                Swal.fire({
                    position: 'success',
                    icon: 'success',
                    text: 'Se Elimino con Exito',
                    showConfirmButton: false,
                    timer: 1500
                });
                window.location = "<?php echo base_url().'persona';?>";
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
</script>