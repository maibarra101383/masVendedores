<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cliente extends CI_Controller{

	public function __construct()
    {
    	parent::__construct();
    	if(!$this->session->userdata('id_user')){
    		redirect(base_url('login'));
    	}
    }

	public function index()
	{
     
    	$this->load->model('cliente_model');
    	$data['aClientes'] = $this->cliente_model->get_clientes($this->session->userdata('id_user'));

		$this->load->view('lista_clientes',$data);

	}

	public function alta_cliente(){

		$this->form_validation->set_rules('usuario', 'Usuario', 'strip_tags|trim|required|is_unique[usuarios.usuario]');

		$data['title'] = "pagina de registro";
		$data['view']  = "alta_clientes";
		//$this->load->view('template',$data);

		if ($this->form_validation->run() === false){

			$data['error_message'] = "";
			$this->load->view('template', $data);

		} else {
			
			$user_data['usuario']   = $this->input->post('usuario');
			$user_data['nombre']    = $this->input->post('nombre');
			$user_data['apat']      = $this->input->post('apat');
			$user_data['amat']      = $this->input->post('amat');
			$user_data['email']     = $this->input->post('email');
			$user_data['telefono']  = $this->input->post('telefono');
			$user_data['direccion'] = $this->input->post('direccion');
			$user_data['status']    = $this->input->post('status');
			$user_data['id_user']   = $this->session->userdata('id_user');

			$this->load->model('cliente_model');
			$result = $this->cliente_model->insert_cliente($user_data);

			if ($result === true){
				redirect(base_url('cliente'));
			}

		}
	}
public function editar_cliente($id_cliente)
	{
 
 		if(!$this->session->userdata('id_user')){
    		redirect(base_url('login'));
    	}

		$this->form_validation->set_rules('nombre_cliente', 'Nombre Cliente', 'strip_tags|trim|required');

		//$this->load->view('template',$data);
		$this->load->model('cliente_model');

		if ($this->form_validation->run() === false){

			$data = $this->cliente_model->get_cliente($id_cliente);
			$data = array_pop($data);
			$data['error_message'] = "";
			$data['title'] = "pagina de registro";
			$data['view']  = "editar_clientes";

			$this->load->view('template', $data);

		} else {
			
			$cliente_data['nombre_cliente'] = $this->input->post('nombre_cliente');
			$cliente_data['status']         = $this->input->post('status');

			$id_dg = $this->input->post('id_datos_generales');;
			$dg_data['nombre']     = $this->input->post('nombre');
			$dg_data['apellido_p'] = $this->input->post('apat');
			$dg_data['apellido_m'] = $this->input->post('amat');
			$dg_data['email']      = $this->input->post('email');
			$dg_data['telefono']   = $this->input->post('telefono');
			$dg_data['direccion']  = $this->input->post('direccion');
			

			$result = $this->cliente_model->editar_clientes($id_dg, $dg_data, $id_cliente, $cliente_data);

			if ($result === true){
				redirect(base_url('cliente'));
			}

		}

	}
}