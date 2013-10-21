<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vendedor extends CI_Controller{

	public function __construct()
    {
    	parent::__construct();
    	if(!$this->session->userdata('id_user')){
    		redirect(base_url('login'));
    	}
    }
	
	public function index()
	{
     
    	$this->load->model('vendedor_model');
    	$data['aVendedor'] = $this->vendedor_model->get_vendedores($this->session->userdata('id_user'));
    
        $this->load->view('lista_vendedores',$data);

	}

   public function alta_vendedor(){

		$this->form_validation->set_rules('usuario', 'Usuario', 'strip_tags|trim|required|is_unique[usuarios.usuario]');
        $this->form_validation->set_rules('clave', 'Clave', 'strip_tags|trim|required|md5');
		$data['title'] = "pagina de registro";
		$data['view']  = "alta_vendedor";
		//$this->load->view('template',$data);

		if ($this->form_validation->run() === false){

			$data['error_message'] = "";
			$this->load->view('template', $data);

		} else {
			
			$user_data['usuario']   = $this->input->post('usuario');
			$user_data['clave']     = $this->input->post('clave');
			$user_data['nombre']    = $this->input->post('nombre');
			$user_data['apat']      = $this->input->post('apat');
			$user_data['amat']      = $this->input->post('amat');
			$user_data['email']     = $this->input->post('email');
			$user_data['telefono']  = $this->input->post('telefono');
			$user_data['telefono2']  = $this->input->post('telefono2');
			$user_data['direccion'] = $this->input->post('direccion');
			$user_data['status']    = $this->input->post('status');
			$user_data['id_user']   = $this->session->userdata('id_user');
			
			$this->load->model('vendedor_model');
			$result = $this->vendedor_model->insert_vendedor($user_data);

			if ($result === true){
				redirect(base_url());
			}

		}
    }

	public function editar_vendedor()
	{
 
 		if(!$this->session->userdata('id_user')){
    		redirect(base_url('login'));
    	}

		$this->form_validation->set_rules('usuario', 'Usuario', 'strip_tags|trim|required');
        $this->form_validation->set_rules('clave', 'Clave', 'strip_tags|trim|required|md5');
		//$this->load->view('template',$data);
		$this->load->model('vendedor_model');

		if ($this->form_validation->run() === false){

			$data = $this->vendedor_model->get_vendedor($this->session->userdata('id_user'));
			$data = array_pop($data);
			$data['error_message'] = "";
			$data['title'] = "pagina de registro";
			$data['view']  = "editar_vendedor";

			$this->load->view('template', $data);

		} else {
			
			$id_user = $this->session->userdata('id_user');
			$user_data['usuario'] = $this->input->post('usuario');
			$user_data['zona']    = $this->input->post('zona');

			$id_dg = $this->input->post('id_datos_generales');;
			$dg_data['nombre']     = $this->input->post('nombre');
			$dg_data['apellido_p'] = $this->input->post('apat');
			$dg_data['apellido_m'] = $this->input->post('amat');
			$dg_data['email']      = $this->input->post('email');
			$dg_data['telefono']   = $this->input->post('telefono');
			$dg_data['telefono2']  = $this->input->post('telefono2');
			$dg_data['direccion']  = $this->input->post('direccion');
			

			$result = $this->vendedor_model->edit_vendedor($id_dg, $dg_data, $id_user, $user_data);

			if ($result === true){
				redirect(base_url('vendedor'));
			}

		}

	}

}