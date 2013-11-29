<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clientes extends CI_Controller{

	public function __construct()
    {
    	parent::__construct();
    	if(!$this->session->userdata('id_user')){
    		//redirect(base_url('login'));
    	}
    }

	public function index($page = 1, $id_vendedor = NULL)
	{

		$clientes = new Cliente();

		if($id_vendedor == NULL){

			$clientes->where('usuario_id', $this->session->userdata('id_user'));
			$clientes->order_by('nombre');
    		$clientes->get_paged_iterated($page,10);

    		$data['aClientes'] = $clientes;

    	} else {

			$clientes->where('usuario_id', $id_vendedor);
    		$clientes->order_by('nombre');
    		$clientes->get_paged_iterated($page,10);

    		$data['aClientes'] = $clientes;
    	}
		
		$data['id_vendedor']  = $id_vendedor;		
		$data['paginaActual'] = $page;        
        $data['view']         ='sistema/lista_clientes';
    	$data['cssFiles']     = array('style.css','sistema.css');

		$this->load->view('template',$data);

	}

	public function alta_cliente(){

		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
		$this->form_validation->set_rules('cliente', 'Cliente', 'strip_tags|trim|required|ctype_alpha');
		$this->form_validation->set_rules('nombre', 'Nombre', 'strip_tags|trim|required|ctype_alpha');
		$this->form_validation->set_rules('apat', 'Apellido Paterno', 'strip_tags|trim|required|ctype_alpha');
		$this->form_validation->set_rules('amat', 'Apellido Materno', 'strip_tags|trim|required|ctype_alpha');
		$this->form_validation->set_rules('email', 'Email', 'strip_tags|trim|required|valid_email');
		$this->form_validation->set_rules('lada1', 'Lada 1', 'strip_tags|trim|numeric|max_length[5]');
		$this->form_validation->set_rules('telefono1', 'Teléfono 1', 'strip_tags|trim|required|ctype_alnum_plus|max_length[13]|');
		$this->form_validation->set_rules('ext1', 'Extención 1', 'strip_tags|trim|ctype_alnum_plus|max_length[5]');
		$this->form_validation->set_rules('lada2', 'Lada 2', 'strip_tags|trim|ctype_alnum_plus|max_length[5]');
		$this->form_validation->set_rules('telefono2', 'Teléfono 2', 'strip_tags|trim|ctype_alnum_plus|max_length[13]');
		$this->form_validation->set_rules('ext2', 'Extención 2', 'strip_tags|trim|ctype_alnum_plus|max_length[5]');
		$this->form_validation->set_rules('direccion', 'Dirección', 'strip_tags|trim|required');
        $this->form_validation->set_rules('cargo_cliente', 'Cargo del Cliente', 'strip_tags|trim|required|ctype_alpha');
        $this->form_validation->set_rules('giro_empresa', 'Giro de la Empresa', 'strip_tags|trim|required|ctype_alpha');
        $this->form_validation->set_rules('fecha_c_show', 'Fecha de Contacto', 'strip_tags|trim|required');
        $this->form_validation->set_rules('fecha_v_show', 'Fecha de Visita', 'strip_tags|trim|required');
 		$clientes = new Cliente();
 		$productos = new Producto();
 		$datosGenerales = new Datos_general();
    
        $data['aProductos'] = $productos->get();
		$data['title']      = "pagina de registro";
		$data['view']       = "sistema/alta_clientes";
		
       

		if ($this->form_validation->run() === false){

           
			$data['cssFiles']  = array('themes/base/jquery-ui.css','sistema.css');
            $data['jsFiles']   = array('jquery.js', 
            						   'jquery-ui/ui/jquery-ui.js',
            						   'jquery-timepicker.js','jquery.ui.datepicker-es.js');

            $data['error_message'] = "";

			$this->load->view('template', $data);


		} else {
			
			$datosGenerales->nombre        = $this->input->post('nombre');
			$datosGenerales->apellido_p    = $this->input->post('apat');
		    $datosGenerales->apellido_m    = $this->input->post('amat');
			$datosGenerales->email         = $this->input->post('email');
			$datosGenerales->lada1         = $this->input->post('lada1');
			$datosGenerales->telefono1     = $this->input->post('telefono1');
			$datosGenerales->ext1          = $this->input->post('ext1');
			$datosGenerales->lada2         = $this->input->post('lada2');
			$datosGenerales->telefono2     = $this->input->post('telefono2');
			$datosGenerales->ext2          = $this->input->post('ext2');
			$datosGenerales->direccion     = $this->input->post('direccion');
			$datosGenerales->id_cliente    = $this->session->userdata('id_cliente');

			if ($datosGenerales->save()){

				$clientes->nombre           = $this->input->post('cliente');
				$clientes->cargo_cliente    = $this->input->post('cargo_cliente');
				$clientes->giro_empresa     = $this->input->post('giro_empresa');
				$clientes->fecha_c          = $this->input->post('fecha_c');
				$clientes->fecha_v          = $this->input->post('fecha_v').':00';
				$clientes->fecha_a = date("Y-m-d H:i:s");
				if($this->input->post('status') && $this->input->post('status') == 1){
		  			$status = 1;
				}else{
	  				$status = 0;
				}
				$oCliente->status = $status;
				$clientes->datos_general_id = $datosGenerales->id;
				$clientes->usuario_id       = $this->session->userdata('id_user');
				$productos->where_in('id',$this->input->post('productos'))->get();
				$clientes->save($productos->all);

			}
				redirect(base_url('clientes'));

		}
		
			}






    public function editar_cliente($id_cliente)
	{
 		
 		if(!$this->session->userdata('id_user')){
    		redirect(base_url('login'));
    	}

        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
    	$this->form_validation->set_rules('cliente', 'Cliente', 'strip_tags|trim|required');
    	$this->form_validation->set_rules('nombre', 'Nombre', 'strip_tags|trim|required|alpha');
		$this->form_validation->set_rules('apat', 'Apellido Paterno', 'strip_tags|trim|required|alpha');
		$this->form_validation->set_rules('amat', 'Apellido Materno', 'strip_tags|trim|required|alpha');
		$this->form_validation->set_rules('email', 'Email', 'strip_tags|trim|required|valid_email');
		$this->form_validation->set_rules('lada1', 'Lada 1', 'strip_tags|trim|numeric|max_length[5]');
		$this->form_validation->set_rules('telefono1', 'Teléfono 1', 'strip_tags|trim|required|numeric|max_length[13]');
		$this->form_validation->set_rules('ext1', 'Extención 1', 'strip_tags|trim|numeric|max_length[5]');
		$this->form_validation->set_rules('lada2', 'Lada 2', 'strip_tags|trim|numeric|max_length[5]');
		$this->form_validation->set_rules('telefono2', 'Teléfono 2', 'strip_tags|trim|numeric|max_length[13]');
		$this->form_validation->set_rules('ext2', 'Extención 2', 'strip_tags|trim|numeric|max_length[5]');
		$this->form_validation->set_rules('direccion', 'Dirección', 'strip_tags|trim|required');
        $this->form_validation->set_rules('cargo_cliente', 'Cargo del Cliente', 'strip_tags|trim|required|alpha');
        $this->form_validation->set_rules('giro_empresa', 'Giro de la Empresa', 'strip_tags|trim|required|alpha');
        $this->form_validation->set_rules('fecha_c', 'Fecha de Contacto', 'strip_tags|trim|required');
        $this->form_validation->set_rules('fecha_v', 'Fecha de Visita', 'strip_tags|trim');
        

         //$this->form_validation->set_rules('id_user');

		$clientes = new Cliente();
		$productos = new Producto();


		$oCliente = $clientes->where('id', $id_cliente)->get();

		if ($this->form_validation->run() === false){

			//$data = $this->cliente_model->get_cliente($id_cliente);
			//$data = array_pop($data);
          
			$data['cssFiles']  = array('themes/base/jquery-ui.css','sistema.css');
            $data['jsFiles']   = array('jquery.js', 
            						   'jquery-ui/ui/jquery-ui.js',
            						   'jquery-timepicker.js','jquery.ui.datepicker-es.js');
            

    

			$data['aCliente']   = $oCliente;
			$data['aProductos'] = $productos->get();

			$data['error_message'] = "";
			$data['title'] = "pagina de registro";

		    $data['view']  = "sistema/editar_clientes";
		    
			$this->load->view('template', $data);
			
		} else {

			$oCliente->datos_general->get();
			$oCliente->nombre = $this->input->post('cliente');
			$oCliente->cargo_cliente= $this->input->post('cargo_cliente');
			$oCliente->giro_empresa = $this->input->post('giro_empresa');
			$oCliente->fecha_c = $this->input->post('fecha_c');
			$oCliente->fecha_v = $this->input->post('fecha_v').':00';
			$oCliente->fecha_m = date("Y-m-d H:i:s");

			$oCliente->datos_general->save();

			//print_r($this->input->post('fecha_v').':00');exit();
			if($this->input->post('status') && $this->input->post('status') == 1){
		  		$status = 1;
			}else{
  				$status = 0;
			}
			$oCliente->status = $status;
			
			$oCliente->datos_general->nombre       = $this->input->post('nombre');
			$oCliente->datos_general->apellido_p   = $this->input->post('apat');
			$oCliente->datos_general->apellido_m   = $this->input->post('amat');
		    $oCliente->datos_general->email        = $this->input->post('email');
            $oCliente->datos_general->lada1        = $this->input->post('lada1');
            $oCliente->datos_general->telefono1    = $this->input->post('telefono1');
	        $oCliente->datos_general->ext1         = $this->input->post('ext1');
	        $oCliente->datos_general->lada2        = $this->input->post('lada2');
	        $oCliente->datos_general->telefono2    = $this->input->post('telefono2');
		    $oCliente->datos_general->ext2         = $this->input->post('ext2');
			$oCliente->datos_general->direccion    = $this->input->post('direccion');
            $id_vendedor = $this->input->post('id_vendedor');
			$oCliente->producto->get();
		
			foreach($oCliente->producto->all as $producto){
				if(!in_array($producto->id, $this->input->post('productos'))){
					$oCliente->delete($producto);
				}	
			}

			$productos->where_in('id',$this->input->post('productos'))->get()->save();


			if ($oCliente->save($productos->all) && $oCliente->datos_general->save()){


				redirect(base_url('clientes/index/1/'.$id_vendedor));
			}

		}

	}
}