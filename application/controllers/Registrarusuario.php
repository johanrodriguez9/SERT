<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Registrarusuario extends CI_Controller {
   
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Modelo_Registrarusuario','uuser');

		$this->store_salt      = $this->config->item('store_salt', 'ion_auth');
		$this->hash_method = $this->config->item('hash_method', 'ion_auth');

    }
  
    function index(){
        //   $this->data['page_content'] = 'registrarusuario';
        $this->load->view('registrarusuario');
        // $this->render();
        // redirect(site_url(Hasher::make(70)));
    }

    function vista_confirmacionemail(){        
        $this->load->view('verficacionusuario');
    }

    public function confirmaremail() { 
        $post = $this->input->post();        

        $id_usuario = $post['id_personatxt'];

		$obj=array(
			'active'=>'1',
		);
		$this->db->WHERE('id',$id_usuario);
		$this->db->update('dp_auth_users',$obj);

        echo '<div class="alert alert-success" style="text-align: center;"><strong>NOTA :</strong> EMAIL ACTIVADO EXITOSAMENTE</div>';

    }

    function vista_reenviar_confirmacionemail(){        
        $this->load->view('reenviarcodigoemail');
    }

    public function buscar_email(){
    	$ci=$this->input->post('ci');
    	$obj=$this->uuser->confirmaremail($ci);
        $estado='';
        
    	$veri=$this->uuser->verificarexistentemail($ci);
        
        
        foreach($veri as $value){
            $estado=$value->active;
        }

        if($obj){ 
            if($estado == '0'){
                if($obj){ 
                    echo '<style>
                        #app-email-confirm{
                            border: 1px solid #28a745!important;
                        }
                        </style>';
                        echo '<div class="form-group">
                                    <label>Codigo</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-lock"></i>
                                        </div>
                                        <input onkeyup="buscar_cod(this.value)" id="app-cod-confirm" type="number" class="form-control" maxlength="50" name="codltxt" placeholder="Ingrese su codigo" required>
                                    </div>
                                </div>
                            <div class="col-lg-12" id="ver_submit">
                            </div>';
                }else{
                    echo '<style>
                            #app-email-confirm{
                                border: 1px solid #28a745!important;
                            }
                        </style>';
                    echo '<div class="alert alert-success" style="text-align: center;"><strong>NOTA :</strong> "EMAIL VERIFICADO"</div>';
                }
            }else{
                echo '<style>
                        #app-email-confirm{
                            border: 1px solid #28a745!important;
                        }
                    </style>';
                echo '<div class="alert alert-success" style="text-align: center;"><strong>NOTA :</strong> "EMAIL VERIFICADO"</div>';
            }
        }else{
            echo '<style>
                    #app-email-confirm{
                        border: 1px solid #dc3545!important;
                    }
                </style>';
        }

    }

    public function reenvia_buscar_email(){
    	$ci=$this->input->post('ci');
    	$obj=$this->uuser->confirmaremail($ci);
        $estado='';
        
    	$veri=$this->uuser->reenvioverificarexistentemail($ci);
        
        
        foreach($veri as $value){
            $estado=$value->active;
            $id_user=$value->id;
        }

        if($obj){ 
            if($estado == '0'){
                if($obj){ 
                    echo '<style>
                        #app-email-confirm{
                            border: 1px solid #28a745!important;
                        }
                        </style>';
                    echo '<input id="app-cod-confirm" value="'.$id_user.'" type="hidden" class="form-control" name="reenviocodltxt" readonly>';
                    echo '<div class="alert alert-danger" style="text-align: center;"><strong>NOTA :</strong> "EMAIL NO VERIFICADO"</div>';
                }else{
                    echo '<style>
                            #app-email-confirm{
                                border: 1px solid #28a745!important;
                            }
                        </style>';
                    echo '<div class="alert alert-success" style="text-align: center;"><strong>NOTA :</strong> "EMAIL VERIFICADO"</div>';
                }
            }else{
                echo '<style>
                        #app-email-confirm{
                            border: 1px solid #28a745!important;
                        }
                    </style>';
                echo '<div class="alert alert-success" style="text-align: center;"><strong>NOTA :</strong> "EMAIL VERIFICADO"</div>';
            }
        }else{
            echo '<style>
                    #app-email-confirm{
                        border: 1px solid #dc3545!important;
                    }
                </style>';
        }

    }


    public function reenviarcodigoconfirmacionemail() { 
        $post1 = $this->input->post();        
        $id_con = $post1['reenviocodltxt'];

        require_once APPPATH. 'libraries/PHPMailer/src/Exception.php';
        require_once APPPATH. 'libraries/PHPMailer/src/PHPMailer.php';
        require_once APPPATH. 'libraries/PHPMailer/src/SMTP.php';
    
        $mail = new PHPMailer(true);
    
        try {
            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'mail.techbo.org';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = '_mainaccount@techbo.org';                     //SMTP username
            $mail->Password   = 'P2Z(llGDe.197v';                               //SMTP password
            $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom('techlabolivia@techbo.org', 'Tech Lab Bolivia');
            $mail->addAddress($post1['emailrtxt']);                           //Add a recipient
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
                        
            $mail->Subject = 'TechLab, te adjuntamos tu codigo de verificacion';
            
            $pas=$this->hash_password('confirmaremaillll');
            $hashc = rand(0,10000000);
            $mail->Body = 'Bienvenido a esta nueva experiencia de aprendizaje, te adjuntamos tu código de verificación: <b>'.$hashc.'</b><br/>Ingrese al enlace para completar su registro: https://techbo.org/u/yLV2OJBn6ZNMymfek0ejgwmza';
        
            $mail->send();
            echo 'El mensaje fue enviado correctamente';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        $obj_codigo2=array(
            'hash_'=>$hashc,
        );

		$this->db->WHERE('id_persona',$id_con);
		$this->db->update('tech_hashconfirmemail',$obj_codigo2);

        echo '<div class="alert alert-success" style="text-align: center;"><strong>NOTA :</strong>EMAIL ENVIADO EXITOSAMENTE</div>';

    }

    public function buscar_confirmarpass(){
    	$id=$this->input->post('ci');
    	$id1=$this->input->post('a');
        
        if($id == $id1){
            echo '<style>
                    #login-passver{
                        border: 1px solid #28a745!important;
                    }
                </style>';
        }else{
            echo '<style>
                    #login-passver{
                        border: 1px solid #dc3545!important;
                    }
                </style>';
        }

    }

    public function buscar_emailconfirmar(){
    	$ci=$this->input->post('ci');
    	$obj=$this->uuser->confirmaremail($ci);
        $estado='';
        
    	$veri=$this->uuser->verificarexistentemail($ci);
        
        
        foreach($veri as $value){
            $estado=$value->active;
        }

        if($obj){ 
            if($estado == '1'){
                if($obj){ 
                    echo '<style>
                        #login-email{
                            border: 1px solid #dc3545!important;
                        }
                        </style>';
                    echo '<div class="app-alert" style="color:red;text-align: center;">Esta cuenta ya existe en el sistema</div>';
                    
                }else{
                    echo '<style>
                            #login-email{
                                border: 1px solid #dc3545!important;
                            }
                        </style>';
                echo '<div class="app-alert" style="color:red;text-align: center;">Esta cuenta ya existe en el sistema</div>';

                }
            }else{
                echo '<style>
                        #login-email{
                            border: 1px solid #dc3545!important;
                        }
                    </style>';
                echo '<div class="app-alert" style="color:red;text-align: center;">Esta cuenta ya existe en el sistema</div>';

            }
        }else{
            echo '<style>
                    #login-email{
                        border: 1px solid #28a745!important;
                    }
                </style>';                
        }

    }

    public function buscar_c(){
    	$ci=$this->input->post('ci');
    	$cod=$this->input->post('condconfirm');
    	$obj=$this->uuser->confirmaremaicodigo($ci,$cod);
    	if($obj){ 
            echo '<input id="login-passver" value="'.$obj->id_persona.'"type="hidden" class="form-control" name="id_personatxt" required>';
            echo '<style>
                    #app-cod-confirm{
                        border: 1px solid #28a745!important;
                    }
                </style>';
            echo '<div class="row">
                        <div class="col-md-12 app-enviar">
                            <button type="submit" class="btn btn-main-primary btn-block">ENVIAR CODIGO</button>
                        </div>
                    </div>';
    	}else{
    		echo '<style>
                    #app-cod-confirm{
                        border: 1px solid #dc3545!important;
                    }
                </style>';
    	}
    }

    public function insertarusuario() { 

    	$email1=$this->input->post('emailrtxt');

        $veriemail=$this->uuser->verificarexistentemail($email1);
        
        if(!$veriemail){
                $post = $this->input->post();        
                $data=[
                    'nombre' => $post['Nombretxt'],
                    'estado' => 'A',
                ];
                
                $this->uuser->addusuario($data);        
    
                $id_usuario = $this->uuser->ultimo_usuario($data);
    
                $nombre=$post['Nombretxt'];
                $apellidos=$post['Apellidos'];
                $usuario=$post['identitytxt'];
                $pass=$post['passwordtxt'];
                $pas=$this->hash_password($pass);
                $var=$this->db->query("SELECT MAX(id) as cantidad FROM dp_auth_users ")->row();
                $id_u=(($var->cantidad)+1);
                $obj=array(
                    'id'=>$id_u,
                    'id_persona'=>$id_usuario,
                    'carrera_id'=>1,
                    'username'=>$usuario,
                    'password'=>$pas,
                    'active'=>'0',
                    'first_name'=>$nombre,
                    'last_name'=>$apellidos,
                    'company'=>'Tech',
                    'email'=>$post['emailrtxt']
                );
    
                $this->db->insert('dp_auth_users',$obj);
    
                $obj1=array(
                    'id'=>$id_u,
                    'user_id'=>$id_u,
                    'group_id'=>'5'
                );
                $this->db->insert('dp_auth_users_groups',$obj1);
                
                
                require_once APPPATH. 'libraries/PHPMailer/src/Exception.php';
                require_once APPPATH. 'libraries/PHPMailer/src/PHPMailer.php';
                require_once APPPATH. 'libraries/PHPMailer/src/SMTP.php';
            
                $mail = new PHPMailer(true);
            
                $post1 = $this->input->post();        
    
                try {
                    //Server settings
                    $mail->SMTPDebug = 0;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'mail.techbo.org';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = '_mainaccount@techbo.org';                     //SMTP username
                    $mail->Password   = 'P2Z(llGDe.197v';                               //SMTP password
                    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
                    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                
                    //Recipients
                    $mail->setFrom('techlabolivia@techbo.org', 'Tech');
                    $mail->addAddress($post1['emailrtxt']);                           //Add a recipient
                
                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Tienda, te adjuntamos tu codigo de verificacion';
                    
                    $pas=$this->hash_password('confirmaremaillll');
                    $hashc = rand(0,10000000);
                    $mail->Body    = $hashc;

                    $mail->Body = 'Bienvenido a esta nueva experiencia de aprendizaje, te adjuntamos tu código de verificación: <b>'.$hashc.'</b><br/>Ingrese al enlace para completar:';
        

                    $mail->send();
                    echo 'El mensaje fue enviado correctamente';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
    
                $obj_codigo=array(
                    'hash_'=>$hashc,
                    'email'=>$post1['emailrtxt'],
                    'id_persona'=>$id_u,
                );
    
                $this->db->insert('tech_hashconfirmemail',$obj_codigo);     
        }

        // redirect(site_url(Hasher::make(7)));
        // $this->render();
    
    }
    
    public function hash_password($password, $salt=false, $use_sha1_override=FALSE){
		if (empty($password))
		{
			return FALSE;
		}

		// bcrypt
		if ($use_sha1_override === FALSE && $this->hash_method == 'bcrypt')
		{
			return $this->bcrypt->hash($password);
		}


		if ($this->store_salt && $salt)
		{
			return  sha1($password . $salt);
		}
		else
		{
			$salt = $this->salt();
			return  $salt . substr(sha1($salt . $password), 0, -$this->salt_length);
		}
	}

    public function salt(){

		$raw_salt_len = 16;

 		$buffer = '';
        $buffer_valid = false;

        if (function_exists('random_bytes')) {
		  $buffer = random_bytes($raw_salt_len);
		  if ($buffer) {
		    $buffer_valid = true;
		  }
		}

		if (!$buffer_valid && function_exists('mcrypt_create_iv') && !defined('PHALANGER')) {
		     $buffer = mcrypt_create_iv($raw_salt_len, MCRYPT_DEV_URANDOM);
		    if ($buffer) {
		        $buffer_valid = true;
		    }
		}

        if (!$buffer_valid && function_exists('openssl_random_pseudo_bytes')) {
            $buffer = openssl_random_pseudo_bytes($raw_salt_len);
            if ($buffer) {
                $buffer_valid = true;
            }
        }

        if (!$buffer_valid && @is_readable('/dev/urandom')) {
            $f = fopen('/dev/urandom', 'r');
            $read = strlen($buffer);
            while ($read < $raw_salt_len) {
                $buffer .= fread($f, $raw_salt_len - $read);
                $read = strlen($buffer);
            }
            fclose($f);
            if ($read >= $raw_salt_len) {
                $buffer_valid = true;
            }
        }

        if (!$buffer_valid || strlen($buffer) < $raw_salt_len) {
            $bl = strlen($buffer);
            for ($i = 0; $i < $raw_salt_len; $i++) {
                if ($i < $bl) {
                    $buffer[$i] = $buffer[$i] ^ chr(mt_rand(0, 255));
                } else {
                    $buffer .= chr(mt_rand(0, 255));
                }
            }
        }

        $salt = $buffer;

        // encode string with the Base64 variant used by crypt
        $base64_digits   = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/';
        $bcrypt64_digits = './ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $base64_string   = base64_encode($salt);
        $salt = strtr(rtrim($base64_string, '='), $base64_digits, $bcrypt64_digits);

	    $salt = substr($salt, 0, $this->salt_length);


		return $salt;

	}

}


