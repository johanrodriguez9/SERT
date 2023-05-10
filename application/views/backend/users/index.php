<?php defined('BASEPATH') OR exit('No direct script access allowed');?>  

<div class="breadcrumb-header justify-content-between">
    <div>
        <h4 class="content-title mb-2">TIENDA</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(Hasher::make(20))?>">INICIO</a></li>
                <li class="breadcrumb-item active" aria-current="page">ADMIN USUARIO</li>
            </ol>
        </nav>
    </div>
    
</div>

<div class="row row-sm" >
    <div class="col-xl-12">
        <div class="card" style=" box-shadow: 0px 5px 10px rgb(52, 73, 94, 0.5);">
            <div class="card-header pb-0">
                    <h2 class="mg-b-0 mt-2" align="center">ADMINISTRACION DE USUARIOS</h2>
            </div>
            <div class="card-body">
                <button type="button" data-toggle="modal" data-target="#modal-basic" class="btn btn-outline-primary btn-lg"><i class="fa fa-plus"></i> ASIGNAR USUARIO</button>
                <br>
                <br>
                <div class="table-responsive">
					<div class="dataTables_wrapper no-footer" id="basic-4_wrapper">
                        <table class="dataTable no-footer" id="basic-3">
                            <thead style="background: #168eea24;">
                                <tr>
                                    <th>#</th>
                                    <th>NOMBRE Y APELLIDO</th>
                                    <th> </th>
                                    <th>TIPO USUARIO</th>
                                    <th>TELEFONO</th>
                                    <th>CORREO</th>
                                    <th>IMAGEN</th>
                                    <th>ESTADO</th>
                                    <th>ACCION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $con=1; foreach ($listar_users as $value) {
                                $obj=$this->ion_auth->tabla_usuario($value->id);
                                ?>
                                    <tr>
                                        <td><?php echo $con++; ?></td>
                                        <td><?php echo $value->first_name; ?></td> 
                                        <td><?php echo $value->last_name ; ?></td> 
                                        <td>
                                            <?php foreach ($this->ion_auth->mostrar_grupo($value->id) as $key) {
                                                echo '<span class="">'.$key->name.'</span>';
                                            } ?>
                                        </td>
                                        <td><?php echo $value->phone ?></td> 
                                        <td><?php echo $value->email ?></td> 
                                    
                                        <td>
                                            <?php if($value->imagen){ ?>
                                                <img width="50" src="<?php echo base_url();?>assets/file_usuario/<?php echo $value->imagen; ?>" alt="image">
                                            <?php }else{ ?>
                                                <img width="50" src="<?php echo base_url();?>assets/alert/no-image.png" alt="image">
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if($obj->active=='1'){ ?>
                                                <div class="form-block">
                                                    <input type="checkbox" class="iswitch iswitch-md iswitch-success" checked onclick="cambiar_estado_t_requisito('<?php echo $value->id ?>','<?php echo $obj->active ?>')">
                                                </div> activo
                                            <?php }else{ ?>
                                                <div class="form-block">
                                                    <input type="checkbox" class="iswitch iswitch-md iswitch-success" onclick="cambiar_estado_t_requisito('<?php echo $value->id ?>','<?php echo $obj->active ?>')">
                                                </div> inactivo
                                            <?php  } ?>
                                        </td>
                                        <td>
                                            <button class="btn btn-outline-primary btn-circle m-b-10" onclick="reset_usuario('<?php echo $value->id; ?>')" title="RESET USUARIO"><span class="fa fa-key"></span></button>
                                            <button class="btn btn-outline-primary btn-circle m-b-10" onclick="editar_usuario('<?php echo $value->id; ?>')" title="EDITAR"><span class="fa fa-pencil"></span></button>
                                            <button class="btn btn-outline-primary btn-circle m-b-10" onclick="eliminar_usuario('<?php echo $value->id; ?>')" title="ELIMINAR"><span class="fa fa-remove"></span></button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div><!-- bd -->
        </div><!-- bd -->
    </div>
</div> 



<div class="modal" id="modal-basic" data-easein="flipInX" data-easeout="flipOutX" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content ">
        <div class="modal-header" style="background: #1172bc;color: #fff; box-shadow: 0px 5px 10px rgb(62, 66, 62);">
        <button type="button" class="close1" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
        <h4 class="modal-title"><strong style="color:#fff;"> ASIGNAR CARGOS USUARIO</strong></h4>
      </div>
      <div class="modal-body">
      <form id="guardar_nuevo_usuario" method="post">
          <div class="row">
              <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <label class="form-label">NOMBRE </label> 
                  <input type="text" class="form-control" name="nombre" placeholder="nombre..." required >
              </div>    
              <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <label class="form-label">APELLIDOS</label> 
                  <input type="text" class="form-control" name="apellido" placeholder="apellido..." required >
              </div>    
              <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label class="form-label">TIPO USUARIO</label> 
                  <select name="id_tipo_usuario" class="form-control"  required>
                      <option></option>
                      <?php foreach ($this->db->get('dp_auth_groups')->result() as $value_tipo) {
                        echo '<option value="'.$value_tipo->id.'">'.$value_tipo->name.'</option> ';
                    } ?>
                  </select>  
              </div>    
              <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <label class="form-label">NUEVO USUARIO</label> 
                  <input type="text" class="form-control" onkeyup="verificar_usuario(this.value)" name="name" required placeholder="Buscar usuario..."  >
                  <span id="error_u"></span>  
              </div>    
              <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label class="form-label">NUEVA CONTRASEÑA</label> 
                <input type="text" class="form-control" name="pass" placeholder="Buscar contraseña..." required >
              </div>

              <div class="modal-footer">
                <button type="submit" id="boton" class="btn btn-outline-primary btn-circle m-b-10 btn-lg"><span class="fa fa-save"></span> GUARDAR DATOS</button>
                <button type="button" class="btn btn-outline-primary btn-circle m-b-10 btn-lg" data-dismiss="modal"><span class="fa fa-close"></span> CANCELAR</button>
              </div>                
          </div>
        </form> 
            
      </div>
    </div>
  </div>
</div>

<div class="modal" id="modal_reset" data-easein="flipInX" data-easeout="flipOutX" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content ">
      <div class="modal-header modal_fer" style="background: #168eea;color: #fff; box-shadow: 0px 5px 10px rgb(62, 66, 62);">
        <button type="button" class="close1" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
        <h4 class="modal-title"><strong style="color:#fff;"> RESET USUARIO Y CONTRASEÑA</strong></h4>
      </div>
      <div class="modal-body">
        <div class="row" id="ver_reset">
           
        </div>
            
      </div>
    </div>
  </div>
</div>

<div class="modal" id="modal_rol_usuario" data-easein="flipInX" data-easeout="flipOutX" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content ">
      <div class="modal-header modal_fer" style="background: #1172bc;color: #fff; box-shadow: 0px 5px 10px rgb(62, 66, 62);">
        <button type="button" class="close1" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
        <h4 class="modal-title"><strong style="color:#fff;">ASIGNAR NUEVO ROL</strong></h4>
      </div>
      <div class="modal-body">
        <div class="" id="ver_rol_usuario">
           
        </div>
            
      </div>
    </div>
  </div>
</div>


<div class="modal" id="modal_editar" data-easein="flipInX" data-easeout="flipOutX" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content ">
      <div class="modal-header" style="background:#1172bc;color: #fff; box-shadow: 0px 5px 10px rgb(62, 66, 62);">
        <button type="button" class="close1" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
        <h4 class="modal-title"><strong style="color:#fff;"> EDITAR USUARIO</strong></h4>
      </div>
      <div class="modal-body">
        <div class="row" id="ver_editar">
           
        </div>
            
      </div>
    </div>
  </div>
</div>


<script>

function buscar_c(ci){
    $.post('<?php echo base_url();?>backend/Users/buscar_c', {ci}, function(data) {
        $("#ver_usuario").html(data);
    });
}

function reset_usuario(id_usuario){
    $("#modal_reset").modal('show')
    $.post('<?php echo base_url();?>backend/Users/reset_usuario', {id_usuario}, function(data) {
        $("#ver_reset").html(data);
    });
}

function eliminar_usuario(id_usuario){
    $.ajax({
      type : "post",
      url  : '<?php echo base_url();?>backend/Users/eliminar_usuario',
      dataType : "json", 
      data : {
        id_usuario : id_usuario
      },
      success: function(data1){
        swal("NOTA!", "USUARIO ELIMINADO EXITOSAMENTE", "success");
        setTimeout(function(){
            window.location='<?php echo base_url(Hasher::make(21)); ?>';
        },1000);
      }
    });
}

function editar_usuario(id_usuario){
    console.log(id_usuario);
    $("#modal_editar").modal('show')
    $.post('<?php echo base_url();?>backend/Users/editar_usuario', {id_usuario}, function(data) {
        $("#ver_editar").html(data);
    });
}

$("#guardar_nuevo_usuario").submit(function(event) {
    event.preventDefault();
    $.ajax({
        url:'<?php echo base_url();?>backend/Users/guardar_nuevo_usuario',
        type:'POST',
        data:$("form").serialize(),
        success:function(){
            swal("NOTA!", "EXITOSAMENTE MODIFICADOS LOS DATOS", "success");
            setTimeout(function(){
                    window.location='<?php echo base_url(Hasher::make(21)); ?>';
                },500);
        }
    });
});


function verificar_usuario(usuario){
    $.post('<?php echo base_url();?>backend/Users/verificar_usuario', {usuario}, function(datos) {
        var valores = eval(datos);
          if (valores[0]==1) {
            document.getElementById('boton').disabled=true;
            $("#error_u").html("<b style='color: #ff0000;'>Usuario ya existe</b>");
          }else{
            document.getElementById('boton').disabled=false;
            $("#error_u").html("<b style='color: #008000;'>Usuario no existe</b>");
          }
    });
}

</script>




