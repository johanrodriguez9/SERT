<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php echo form_open('auth/login'); ?>
<?php echo form_fieldset(lang('login_heading')); ?>

<div class="form_group">
    <h3 style="display: block; margin: 0 0 .6rem; color: rgba(0,0,0,.6); text-transform: uppercase; letter-spacing: .2rem;"> Ingresar: <a href="<?= site_url(Hasher::make(12)); ?>" ></a></h3>
    <?php
    echo form_label(lang('login_identity_label'), 'identity');
    echo form_input($identity);
    ?>
</div>
<div class="form_group">
    <?php
    echo form_label(lang('login_password_label'), 'password');
    echo form_password($password);
    ?>
</div>
<div class="form_group">
    <label class="form_remember label--checkbox">
        <?php
        echo form_checkbox($remember);
        echo lang('login_remember_label');
        ?>
    </label>
    <?php echo anchor('auth/forgot_password', lang('login_forgot_password'), 'class="form_recovery"'); ?>
</div>
<div class="form_group">
    <?php echo form_submit('submit', lang('login_submit_btn')); ?>
</div>
<?php echo form_fieldset_close(); ?>
</form>

<div class="block block--error">{message}</div>
