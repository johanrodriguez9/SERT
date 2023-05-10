
<div class="row">
    <div class="col-12">
        <ul class="nav nav-tabs" role="tablist" style="background-color: lightslategrey;">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#list" role="tab">{lang_list}<?php echo $nbr_users; ?></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{lang_actions}</a>
                <div class="dropdown-menu">
                    <?php echo anchor('backend/users/add', '{lang_add_user}', array('class' => 'dropdown-item')); ?>
                    <!-- <?php echo anchor('#', '{lang_import_list}', array('class' => 'dropdown-item')); ?> -->
                    <div class="dropdown-divider"></div>
                    <?php echo anchor('backend/users/export', '{lang_export_list}', array('class' => 'dropdown-item')); ?>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#help" role="tab">{lang_help}</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Generar Usuarios</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item"  href="<?php echo base_url(Hasher::make(400)); ?>">De Estudiantes</a>
                    <a class="dropdown-item"  href="<?php echo base_url(Hasher::make(401)); ?>">De Docentes</a>
                </div>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="list" role="tabpanel">
                
    <br/>
    <script type="text/javascript">
        $(document).ready(function () {
            (function ($) {
                $('#filtrar').keyup(function () {
                    var rex = new RegExp($(this).val(), 'i');
                    $('.buscar tr').hide();
                    $('.buscar tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();
                })
            }(jQuery));
        });
      </script>    
        <div class="input-group"> <span class="input-group-addon">Buscar</span>
        <input id="filtrar" type="text" class="form-control" placeholder="Ingrese nombre para busqueda...">
      </div>
      
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{lang_first_name}</th>
                            <th>{lang_last_name}</th>
                            <th>Usuario</th>
                            <th>{lang_group}</th>
                            <th>{lang_status}</th>
                            <th>{lang_actions}</th>
                        </tr>
                    </thead>
                    <tbody class="buscar">
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <th scope="row"><?php echo $i++; ?></th>
                                <td><?php echo htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8'); ?></td>
                                <td style="color: green;"><?php echo htmlspecialchars($user->username, ENT_QUOTES, 'UTF-8'); ?></td>
                                <td>
                                    <?php foreach ($user->groups as $group): ?>
                                        <span class="badge badge-default"  style="border-radius: 15px;"><?php echo htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8'); ?></span>
                                    <?php endforeach; ?>
                                </td>
                                <td>
                                    <?php
                                    if ($user->id != 1) {
                                        echo ($user->active) ? anchor('backend/users/deactivate/' . $user->id, '{lang_active}', $user_active) : anchor('backend/users/activate/' . $user->id, '{lang_inactive}', $user_inactive);
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php echo anchor(Hasher::make(5,$user->id)  , '{lang_edit}', array('class' => 'btn btn-primary btn-sm', 'role' => 'button')); ?>
                                    <?php //echo anchor('#' . $user->id, '{lang_see}', array('class' => 'btn btn-primary btn-sm', 'role' => 'button')); ?>
                                    <?php
                                    if ($user->id != 1) {
                                        echo anchor(Hasher::make(555,$user->id), 'Restablecer Pass', array('class' => 'btn btn-danger btn-sm', 'role' => 'button') );
                                    }
                                    ?>
                                    <!-- <span class="badge badge-default" style="border-radius: 15px;">En desarrollo</span> -->
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane" id="help" role="tabpanel">
                coming soon
            </div>
        </div>
    </div>
</div>
