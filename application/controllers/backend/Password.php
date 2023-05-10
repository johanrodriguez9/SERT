<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class Password extends Backend {
 	
 	public function __construct()
 	{
 		parent::__construct();
        $this->load->model('Ion_auth_model');
 		$this->form_validation->set_error_delimiters($this->config->item('error_prefix'), $this->config->item('error_suffix'));
 		if (!$this->ion_auth->logged_in()) {
			redirect('sali', 'refresh');
		} else {
            	if (!$this->ion_auth->in_group('estudiante') && !$this->ion_auth->in_group('docente') && !$this->ion_auth->in_group('kardixta')) {
        		redirect('auth/logout', 'refresh'); 
             	}
		}
 	}

 	   
    public function editas($id)
    {
        if ( ! $this->ion_auth->logged_in() || ( ! $this->ion_auth->is_admin() && ! ($this->ion_auth->user()->row()->id == $id)))
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            $user          = $this->ion_auth->user($id)->row();
            $groups        = $this->ion_auth->groups()->result_array();
            $currentGroups = $this->ion_auth->get_users_groups($id)->result();

            

            if (isset($_POST) && ! empty($_POST))
            {
                // do we have a valid request?
                if ($id != $this->input->post('id'))
                {
                    show_error($this->lang->line('error_csrf'));
                }

                // update the password if it was posted
                if ($this->input->post('password'))
                {
                    $this->form_validation->set_rules('password', 'lang:edit_user_validation_password_label', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
                    $this->form_validation->set_rules('password_confirm', 'lang:edit_user_validation_password_confirm_label', 'required');
                }

                if ($this->form_validation->run() === TRUE)
                {
            
                    // update the password if it was posted
                    if ($this->input->post('password'))
                    {
                        $data['password'] = $this->input->post('password');
                    }

                    // Only allow updating groups if user is admin
                    if ($this->ion_auth->is_admin())
                    {
                        //Update the groups user belongs to
                        $groupData = $this->input->post('groups');

                        if (isset($groupData) && !empty($groupData))
                        {
                            $this->ion_auth->remove_from_group('', $id);

                            foreach ($groupData as $grp)
                            {
                                $this->ion_auth->add_to_group($grp, $id);
                            }
                        }
                    }

                    // check to see if we are updating the user
                    if ($this->ion_auth->update($user->id, $data))
                    {
                        // redirect them back to the admin page if admin, or to the base url if non admin
                        $this->session->set_flashdata('message', $this->ion_auth->messages());

                        if ($this->ion_auth->is_admin())
                        {
                            redirect('backend/users', 'refresh');
                        }
                        else
                        {
                            redirect('/', 'refresh');
                        }
                    }
                    else
                    {
                        // redirect them back to the admin page if admin, or to the base url if non admin
                        $this->session->set_flashdata('message', $this->ion_auth->errors());

                        if ($this->ion_auth->is_admin())
                        {
                            redirect('backend/users', 'refresh');
                        }
                        else
                        {
                            redirect('/', 'refresh');
                        }
                    }
                }
            }

            $this->data['password'] = array(
                'type'  => 'password',
                'name'  => 'password',
                'id'    => 'password',
                'class' => 'form-control form-control-warning'
            );
            $this->data['password_confirm'] = array(
                'type'  => 'password',
                'name'  => 'password_confirm',
                'id'    => 'password_confirm',
                'class' => 'form-control form-control-warning'
            );

            // $this->data['csrf']          = $this->_get_csrf_nonce();
            $this->data['user_id']       = $user->id;
            $this->data['groups']        = $groups;
            $this->data['currentGroups'] = $currentGroups;
            $this->data['message']       = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
            $this->data['subtitle']      = $this->lang->line('edit_user_heading');
            $this->data['page_content']  = 'backend/users/edita';

            $this->render();
        }
    }
    
    public function restablecer_pass($id){

        $id_usuario =  $this->Ion_auth_model->usuario($id);
        $ids = $id_usuario->id_persona;
        $fecha = $this->Ion_auth_model->fecha($ids);
        $fechau = $fecha->fechas;
        $data = array(
            'id' => $id,
            'password' => $fechau,
        );
        $this->ion_auth->update($id, $data);
        redirect(Hasher::make(21));
    } 
 }
 
 /* End of file Password.php */
 /* Location: ./application/controllers/backend/Password.php */ 