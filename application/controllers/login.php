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
    			redirect(base_url('vendedor'));
    		}
    	}

		$this->form_validation->set_rules('clave', 'Clave', 'strip_tags|trim|required|md5');
		$this->form_validation->set_rules('nombre', 'Usuario', 'strip_tags|trim|required');

		 if($this->form_validation->run() === false){

		 	$this->load->view('login');

		 } else {

		 	 $oUsuario = new Usuario();

	 	     $usuario = $this->input->post('nombre');
	 	     $clave   = $this->input->post('clave');

	 	     $usu = $oUsuario->where(array('usuario'=>$usuario,'clave'=>$clave))->get();	
	 	     $result = $usu->count(); 
	         if($result){

	         	$userdata = array('user_name' => $usu->usuario,
                              	  'admin'     => $usu->es_admin,
                              	  'id_user'   => $usu->id);
	         
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
}
?>