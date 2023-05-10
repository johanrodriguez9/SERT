<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends Authenticate {

    public function __construct() {

        parent::__construct();

		$this->load->model('Modelo_comunidad');
        
        $this->load->library('session');

    }



    public function index() {

        //redirect('auth/login', 'refresh');
		$dato['listar_institucion']=$this->Modelo_comunidad->listar_comunidad();

        // redirect(site_url(Hasher::make(1)));

        $dato['contenido']="login";
		$this->load->view('login',$dato);
        // $this->load->view('login');

    }

    

    public function login() { 

        $this->data['subtitle'] = $this->lang->line('login_heading');

        if (!$this->ion_auth->logged_in()) { 

            // echo ">".$_SESSION['tmptxt'];exit();
            $this->form_validation->set_rules('identity', 'lang:login_identity_label', 'required');
            $this->form_validation->set_rules('password', 'lang:login_password_label', 'required');
            $this->form_validation->set_rules('remember', 'lang:login_remember_label', 'integer');
            if ($this->form_validation->run() == TRUE) { 
                $remember = (bool) $this->input->post('remember');
                $tmptxt=$this->input->post('tmptxt');
                if ($tmptxt==$this->session->userdata('captcha')) {
                    if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember)) {
                        $this->session->set_flashdata('message', $this->ion_auth->messages());
                        //redirect('auth/choice', 'refresh');
                        //redirecciones por grupo de logeo 
                       // if ($this->ion_auth->in_group('kardixta')) { //verifica grupo
                        //}
                        //caso default
                       // redirect(site_url(Hasher::make(2)));
                        echo json_encode(array(0 => 0));
                    } else {
                        $this->session->set_flashdata('message', $this->ion_auth->errors());
                        //redirect('auth/login', 'refresh');
                        echo json_encode(array(0 => 1));
                        // redirect(site_url(Hasher::make(1)));
                    }   
                }else{
                    // $this->session->set_flashdata('message', 'error de captcha');
                    echo json_encode(array(0 => 2));
                    // redirect(site_url(Hasher::make(1)));
                }  
            } else {
                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
                $this->data['identity'] = array(
                    'type' => 'text',
                    'name' => 'identity',
                    'id' => 'identity',
                    'value' => $this->form_validation->set_value('identity')
                );

                $this->data['password'] = array(
                    'type' => 'password',
                    'name' => 'password',
                    'id' => 'password'
                );

                $this->data['remember'] = array(
                    'type' => 'checkbox',
                    'name' => 'remember',
                    'id' => 'remember',
                    'value' => '1',
                    'class' => 'checkbox',
                    'checked' => $this->form_validation->set_checkbox('remember', '1')
                );

                // echo json_encode(array(0 => 1));
                //$this->data['page_content'] = 'auth/login';
                redirect(site_url(Hasher::make(7)));
                $this->render();
            }
        } else {

            // echo json_encode(array(0 => 1));
             // redirect(site_url(Hasher::make(2)));

           redirect('auth/choice', 'refresh');
        }

    }



    public function logout() {

        $logout = $this->ion_auth->logout();



        $this->session->set_flashdata('message', $this->ion_auth->messages());

        redirect('/', 'refresh');

    }



    public function choice() {

        redirect(site_url(Hasher::make(3)));

        if (!$this->ion_auth->logged_in()) {

            redirect('/', 'refresh');

        } elseif ($this->ion_auth->logged_in() ) {  //elseif ($this->ion_auth->logged_in() && $this->ion_auth->is_admin())

            $this->data['subtitle'] = $this->lang->line('login_heading');



            $this->data['page_content'] = 'auth/choice';

            $this->render();

        } else {

            redirect('/', 'refresh');

        }

    }



    public function forgot_password() {

        $this->data['subtitle'] = $this->lang->line('forgot_password_heading');



        if ($this->config->item('identity', 'ion_auth') != 'email') {

            $this->form_validation->set_rules('identity', 'lang:forgot_password_identity_label', 'required');

        } else {

            $this->form_validation->set_rules('identity', 'lang:forgot_password_validation_email_label', 'required|valid_email');

        }



        if ($this->form_validation->run() == FALSE) {

            $this->data['type'] = $this->config->item('identity', 'ion_auth');



            $this->data['identity'] = array(

                'name' => 'identity',

                'id' => 'identity'

            );



            if ($this->config->item('identity', 'ion_auth') != 'email') {

                $this->data['identity_label'] = $this->lang->line('forgot_password_identity_label');

            } else {

                $this->data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');

            }



            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');



            $this->data['page_content'] = 'auth/forgot_password';

            $this->render();

        } else {

            $identity_column = $this->config->item('identity', 'ion_auth');

            $identity = $this->ion_auth->where($identity_column, $this->input->post('identity'))->users()->row();



            if (empty($identity)) {

                if ($this->config->item('identity', 'ion_auth') != 'email') {

                    $this->ion_auth->set_error('forgot_password_identity_not_found');

                } else {

                    $this->ion_auth->set_error('forgot_password_email_not_found');

                }



                $this->session->set_flashdata('message', $this->ion_auth->errors());

                redirect('auth/forgot_password', 'refresh');

            }



            // run the forgotten password method to email an activation code to the user

            $forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});



            if ($forgotten) {

                $this->session->set_flashdata('message', $this->ion_auth->messages());

               // redirect('auth/login', 'refresh');

                redirect(site_url(Hasher::make(1)));

                

            } else {

                $this->session->set_flashdata('message', $this->ion_auth->errors());

                redirect('auth/forgot_password', 'refresh');

            }

        }

    }

    public function captchadom(){
        // session_start();
       // $this->session->sess_destroy();
       $ranStr = md5(microtime());
       $ranStr = substr($ranStr, 0, 6);
       $this->session->set_userdata(array('captcha' =>$ranStr));
       $newImage = imagecreatefromjpeg("assets/captcha/bgcaptcha2.jpg");
       $txtColor = imagecolorallocate($newImage, 0, 0, 0);
       imagestring($newImage, 5, 30, 8, $ranStr, $txtColor);
       header("Content-type: image/jpeg");
       imagejpeg($newImage);
       // $this->session->sess_destroy();

   } 

    



}

