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

		$this->form_validation->set_rules('usuario', 'Usuario', 'strip_tags|trim|required[usuarios.usuario]');

        $this->load->model('cliente_model');
        $aProductos = $this->cliente_model->get_productos();
    
        $data['aProductos'] = $aProductos;
		$data['title'] = "pagina de registro";
		$data['view']  = "alta_clientes";

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
			$user_data['telefono2']  = $this->input->post('telefono2');
			$user_data['direccion'] = $this->input->post('direccion');
			$user_data['cargo_del_cliente'] = $this->input->post('cargo_del_cliente');
			$user_data['giro_de_la_empresa'] = $this->input->post('giro_de_la_empresa');
			$user_data['status']    = $this->input->post('status');
			$user_data['id_cliente']   = $this->session->userdata('id_cliente');
			$user_data['productos'] = $this->input->post('productos');

			$result = $this->cliente_model->insert_cliente($user_data);

			if ($result === true){
				redirect(base_url('cliente'));
			}

		}
	}
            public function editar_cliente($id_cliente)
	{
 
 		if(!$this->session->userdata('id_cliente')){
    		//redirect(base_url('login'));
    	}

		$this->form_validation->set_rules('usuario', 'Nombre  del Cliente', 'strip_tags|trim|required');
        $this->form_validation->set_rules('clave', 'Clave', 'strip_tags|trim|required|md5');
		//$this->load->view('template',$data);
		$this->load->model('cliente_model');

		if ($this->form_validation->run() === false){

			$data = $this->cliente_model->get_cliente($this->session->userdata('id_cliente'));
			$data = array_pop($data);
			$data['error_message'] = "";
			$data['title'] = "pagina de registro";

		    $data['view']  = "editar_clientes";

			$this->load->view('template', $data);

		} else {
			
			$id_cliente = $this->session->userdata('id_cliente');
			$cliente_data['usuario'] = $this->input->post('usuario');
			$cliente_data['status'] = $this->input->post('status');

			$id_dg = $this->input->post('id_datos_generales');;
			$dg_data['nombre']       = $this->input->post('nombre');
			$dg_data['apellido_p']   = $this->input->post('apat');
			$dg_data['apellido_m']   = $this->input->post('amat');
			$dg_data['email']        = $this->input->post('email');
			$dg_data['telefono']     = $this->input->post('telefono');
			$dg_data['telefono2']    = $this->input->post('telefono2');
			$dg_data['direccion']    = $this->input->post('direccion');
		    $dg_data['cargo_cliente']= $this->input->post('cargo_del_cliente');
			$dg_data['giro_empresa'] = $this->input->post('giro_de_la_empresa');
			
			$result = $this->cliente_model->editar_clientes($id_dg, $dg_data, $id_cliente, $cliente_data);

			if ($result === true){
				redirect(base_url('cliente'));
			}

		}

	}
}