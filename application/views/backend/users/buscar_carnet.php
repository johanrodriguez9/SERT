<?php 
    $verificar=$this->ion_auth->verificar_usuario_existente($obj->id);

    if ($verificar) { ?>

        <!--     <div class="alert alert-success"><strong>NOTA : USUARIO YA REGISTRADO EN EL SISTEMA</strong> -->
            <!--  <form id="guardar_nuevo_usuario" method="post">
            <div class="col-md-12"><h3>DATOS PERSONALES</h3> -->

            <!--  <div class="alert alert-success"><strong>CARNET :</strong> <?php echo $obj->ci; ?></div>
                <div class="alert alert-info"><strong>NOMBRE Y AP. :</strong> <?php echo $obj->nombre.' '.$obj->paterno.' '.$obj->materno; ?></div> -->
                
        <div class="alert alert-success"><strong>NOTA : USUARIO YA REGISTRADO EN EL SISTEMA</strong>

                <!-- <div class="col-lg-12">
                    <div class="form-group">

                            
                        <label class="form-label">SELECCIONAR ROL</label> 
                        <select name="id_grupo" class="form-control">
                            <option></option>
                            <?php foreach ($this->db->get("dp_auth_groups")->result() as $t_use) {  ?>
                                <option value="<?php echo $t_use->id ?>" <?php if($t_use->id==$verificar->group_id) echo "selected"; ?>><?php echo $t_use->name; ?></option>
                            <?php } ?>
                        </select>
                    </div>    
                </div>
                
            </div>
            <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $verificar->user_id ?>">
            <button type="submit" class="btn btn-outline-primary btn-lg btn-block"><span class="fa fa-save"></span> GUARDAR DATOS</button>
        </form> --> 
        <script>

        // $("#guardar_editar_usuario").submit(function(event) {
        //     event.preventDefault();
        //      $('#loading').modal({backdrop: 'static', keyboard: false});
        //     $.ajax({
        //         url:'<?php echo base_url();?>backend/Users/guardar_editar_usuario',
        //         type:'POST',
        //         data:$("form").serialize(),
        //         success:function(){
        //             swal('EXITOSAMENTE GUARDADO LOS DATOS')
        //             setTimeout(function(){
        //                  window.location='';
        //             },1000);
        //         }
        //     });
        // });

        </script>
    <?php }else{ ?>
        <!-- ////// como nuevo usuario -->
        <form id="guardar_nuevo_usuario" method="post">
            <div class="col-md-12">
                <h3>DATOS PERSONALES</h3>
                <div class="alert alert-success">
                    <strong>CARNET :</strong> <?php echo $obj->ci; ?>
                </div>
                <div class="alert alert-info">
                    <strong>NOMBRE Y AP. :</strong> <?php echo $obj->nombre.' '.$obj->paterno.' '.$obj->materno; ?>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="form-label">NRO DE CELULAR</label> 
                        <div class="input-group mb-3">
                            <input type="int" id="celular" name="celular" maxlength="25"  aria-describedby="basic-addon2" aria-label="Recipient's username" class="form-control" " placeholder="Introduzca su Nro de celular"  >
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"><i class="mdi mdi-account-convert"></i></span>
                            </div>
                        </div> 
                        <br><br>
                        <label class="form-label">SELECCIONAR ROL</label> 
                        <select name="id_grupo" class="form-control">
                            <option></option>
                            <?php foreach ($this->db->get("dp_auth_groups")->result() as $t_use) {  ?>
                                <option value="<?php echo $t_use->id ?>"><?php echo $t_use->name; ?></option>
                            <?php } ?>
                        </select>
                    </div>    
                </div>
            </div>
            <input type="hidden" name="ci" value="<?php echo $obj->ci ?>">
            <input type="hidden" name="nombre" value="<?php echo $obj->nombre ?>">
            <input type="hidden" name="fecha_nac" value="<?php echo $obj->fecha_nac ?>">
            <input type="hidden" name="id_persona" value="<?php echo $obj->id ?>">
            <hr>
            <button type="submit" class="btn btn-outline-primary btn-lg"><span class="fa fa-save"></span> GUARDAR DATOS</button>
        </form>

        <script>
            $("#guardar_nuevo_usuario").submit(function(event) {
                event.preventDefault();
                $.ajax({
                    url:'<?php echo base_url();?>backend/Users/guardar_nuevo_usuario',
                    type:'POST',
                    data:$("form").serialize(),
                    success:function(dat){
                        swal('EXITOSAMENTE GUARDADO LOS DATOS');
                        setTimeout(function(){
                            window.location='';
                        },2500);
                    }
                });
            });

        </script>
<?php }  ?>
