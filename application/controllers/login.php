<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
	} 

	public function index(){
   
    
		if($this->session->userdata('id_user')){
			if($this->session->userdata('admin') == 0){
    			redirect(base_url('clientes'));
    		} else {
    			redirect(base_url('vendedores'));
    		}
    	
    	}

        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
        $this->form_validation->set_rules('nombre', 'Usuario', 'strip_tags|trim|required|valid_email|callback_masQweb');
		$this->form_validation->set_rules('clave', 'Clave', 'strip_tags|trim|required|md5');
        
		 if($this->form_validation->run() === false){
               
              
   
		 	         $data['error_message'] = "";
                     $data['view'] = 'login';
                     $data['cssFiles'] = array('style.css','login/8-login-form/css/style.css');

		             $data['jsFiles']  = array('jquery.js',
								  'jquery-validation/dist/jquery.validate.js',
								  'jquery-validation/localization/messages_es.js',
								  'valid_forms.js');
		
			         $this->load->view('template', $data);

    
           
		 } else {

		 	 $oUsuario = new Usuario();



		 	 //if(!$this->session->userdata('id_user'))
		 	 	//redirect(base_url('login'));


	 	     $usuario = $this->input->post('nombre');
	 	     $clave   = $this->input->post('clave');



	 	     $usu = $oUsuario->where(array('usuario'=>$usuario,'clave'=>$clave))->get();	
	 	     
	         if($usu->id){

	         	$usu->datos_general->get();

	         	$userdata = array('usuario' => $usu->usuario,
                              	  'admin'     => $usu->es_admin,
                              	  'id_user'   => $usu->id,
                              	  'nombre_completo' => $usu->datos_general->nombre.' '.
	                              					   $usu->datos_general->apellido_p.' '.
	                              					   $usu->datos_general->apellido_m);
	         
   	  			$this->session->set_userdata($userdata);

	         	if($this->session->userdata('admin') == 0){
    				redirect(base_url('clientes'));
    			} else {
    				redirect(base_url('vendedores'));
    			}


	         }else{

	         	redirect(base_url('login'));

	         }

		 }
			

 	}

 	public function logout(){
 		$this->session->sess_destroy();
 		redirect(base_url('login'));
 	}

 	function masQweb($masqweb)
	{

	     $mail=explode('@', $masqweb);
	     $data['cssFiles'] = array('styles.css','sistema.css','login/style2.css');

	    if ($mail[1]=='masqweb.com')
	    return true;
	    else
	    return false;





	}
}
?>