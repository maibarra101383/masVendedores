<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Producto extends CI_Controller{

	public function __construct()
    {
    	parent::__construct();
    	if(!$this->session->userdata('id_user')){
    		redirect(base_url('login'));
    	}
    }

	public function index()
	{
     
    	$this->load->model('producto_model');
    	$data['aProducto'] = $this->producto_model->get_producto($this->session->userdata('id_user'));

		$this->load->view('lista_producto',$data);

	}

	public function alta_producto(){

		$this->form_validation->set_rules('usuario', 'Usuario', 'strip_tags|trim|required|is_unique[usuarios.usuario]');

		$data['title'] = "pagina de registro";
		$data['view']  = "alta_productos";
		//$this->load->view('template',$data);

		if ($this->form_validation->run() === false){

			$data['error_message'] = "";
			$this->load->view('template', $data);

		} else {
			
			$user_data['usuario']   = $this->input->post('usuario');
			$user_data['nombre']    = $this->input->post('nombre');
			$user_data['status']    = $this->input->post('status');
			$user_data['id_user']   = $this->session->userdata('id_user');

			$this->load->model('producto_model');
			$result = $this->producto_model->insert_producto($user_data);

			if ($result === true){
				redirect(base_url('lista_producto'));
			}

		}
	}
        public function editar_producto($id_producto)
	{
 
 		if(!$this->session->userdata('id_user')){
    		redirect(base_url('login'));
    	}

		$this->form_validation->set_rules('nombre', 'Nombre', 'strip_tags|trim|required');

		//$this->load->view('template',$data);
		$this->load->model('producto_model');

		if ($this->form_validation->run() === false){

			$data = $this->producto_model->get_producto($id_producto);
			$data = array_pop($data);
			$data['error_message'] = "";
			$data['title'] = "pagina de registro";
			$data['view']  = "editar_producto";

			$this->load->view('template', $data);

		} else {
			
			$cliente_data['nombre'] = $this->input->post('nombre');
			$cliente_data['status'] = $this->input->post('status');
			$cliente_data['registro'] = $this->input->post('registro');

			$id_dg = $this->input->post('id_datos_generales');;
			$dg_data['nombre']     = $this->input->post('nombre');
			$dg_data['status']  = $this->input->post('status');
			
			

			$result = $this->producto_model->editar_productos($id_dg, $dg_data, $id_producto, $id_cliente);

			if ($result === true){
				redirect(base_url('producto'));
			}

		}

	}
}