                
    <div class="alert alert-success">
        <strong>NOTA : USUARIO NO REGISTRADO EN EL SISTEMA</strong>
    </div>

    <div class="">    
        <form id="guardar_nuevo_usuario" method="post">
            <div class="row">
                <div class="form-group col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <label class="form-label" for="">Nombre</label>
                    <input type="text" class="form-control" placeholder="Nombre completo" id="nombretxt" name="nombretxt" required>
                </div>
                <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12" >
                    <label class="form-label" for="">Apellido Paterno</label>
                    <input type="text" class="form-control" placeholder="Apellido Paterno" id="apaternotxt" name="apaternotxt" required>
                </div>
                <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12" >
                    <label class="form-label" for="">Apellido Materno</label>
                    <input type="text" class="form-control" placeholder="Apellido Materno" id="amaternotxt" name="amaternotxt" required>
                </div>
                <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12" >
                    <label class="form-label" for="">Cedula Identidad</label>
                    <input type="number" class="form-control" placeholder="0000000000" id="citxt" name="citxt" required>
                </div>
                <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12" >
                    <label class="form-label" for="">Fecha Nacimiento</label>
                    <input type="date" class="form-control" placeholder="Fecha" id="fechantxt" name="fechantxt" required>
                </div>
                <div class="form-group col-lg-4 col-md-6 col-sm-6 col-xs-12" >
                    <label class="form-label" for="">Expedida</label>
                    <select class='form-control' id="expedidotxt" name="expedidotxt" searchable=''>
                        <option style="color: #c4bfbf;" disabled="" selected="">Seleccionar</option>
                        <option value="LP">CH</option>
                        <option value="LP">LP</option>
                        <option value="LP">CB</option>
                        <option value="LP">OR</option>
                        <option value="LP">PT</option>
                        <option value="LP">TJ</option>
                        <option value="LP">SC</option>
                        <option value="LP">BE</option>
                        <option value="LP">PD</option>
                    </select>
                </div>

            </div>
            <button type="submit" class="btn btn-outline-primary btn-lg"><span class="fa fa-save"></span> GUARDAR DATOS</button>
        </form>
        </div>


<script>
    $("#guardar_nuevo_usuario").submit(function(event) {
        event.preventDefault();
        $.ajax({
            url:'<?php echo base_url();?>backend/Users/guardar_nuevo_usuario_nuevo',
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
