<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index(){

		$this->form_validation->set_rules('clave', 'Clave', 'strip_tags|trim|required');
		$this->form_validation->set_rules('nombre', 'Usuario', 'strip_tags|trim|required');

		 if($this->form_validation->run() === false){

		 	$this->load->view('login');

		 } else {

	 	     $usuario = $this->input->post('nombre');
	 	     $clave   = $this->input->post('clave');
	 	     
	 	     $this->load->model('login_model');
	         $result = $this->login_model->get_usuarios($usuario,$clave);	

	         if($result === true){

	         	redirect(base_url('cliente'));

	         }else{

	         	redirect(base_url('login'));

	         }

		 }
			

 	}
}
?>