<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
	} 

	public function index(){

		if($this->session->userdata('id_user')){
			if($this->session->userdata('admin') == 0){
    			redirect(base_url('cliente'));
    		} else {
    			redirect(base_url('vendedor'));
    		}
    	}

		$this->form_validation->set_rules('clave', 'Clave', 'strip_tags|trim|required|md5');
		$this->form_validation->set_rules('nombre', 'Usuario', 'strip_tags|trim|required');

		 if($this->form_validation->run() === false){

		 	$this->load->view('login');

		 } else {

	 	     $usuario = $this->input->post('nombre');
	 	     $clave   = $this->input->post('clave');
	 	     
	 	     $this->load->model('login_model');
	         $result = $this->login_model->get_usuarios($usuario,$clave);	

	         if($result === true){
	         	if($this->session->userdata('admin') == 0){
    				redirect(base_url('cliente'));
    			} else {
    				redirect(base_url('vendedor'));
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