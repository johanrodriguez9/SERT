<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/*
|--------------------------------------------------------------------------
| Ion Auth
|--------------------------------------------------------------------------
|
| Custom database
*/
$config['tables']['groups_color'] = 'dp_auth_groups_color';

/*
|--------------------------------------------------------------------------
| Theme
|--------------------------------------------------------------------------
|
|
*/
//genra rgs
$config['dp_sistema']      = 'Inscripciones upea';
/* Authentification */
$config['dp_theme_auth']         = 'default';
$config['dp_theme_auth_url']     = 'assets/auth/' . $config['dp_theme_auth'] . '/';

/* Back End */
$config['dp_theme_backend']      = 'assets';
$config['dp_theme_backend_url']  = 'assets/admin/' . $config['dp_theme_backend'] . '/';

/* Front End */
$config['dp_theme_frontend']     = 'educomp';
$config['dp_theme_frontend_url'] = 'assets/frontend/' . $config['dp_theme_frontend'] . '/v2.1/';

/*
|--------------------------------------------------------------------------
| Form Validation
|--------------------------------------------------------------------------
|
| Changing the Error Delimiters
*/
$config['error_prefix'] = '<div class="alert alert-danger" role="alert">';
$config['error_suffix'] = '</div>';
