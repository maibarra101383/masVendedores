<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vendedores extends CI_Controller{

	public function __construct()
    {
    	parent::__construct();
    	if(!$this->session->userdata('id_user')){
    		
    	}
    }
	
	public function index()
	{       
		if($this->session->userdata('admin')==0){
    		redirect(base_url('clientes'));
    	}

        $vendedor = new Usuario();

    	$data['aVendedores'] = $vendedor->get();
    	$data['view'] = 'lista_vendedores';
		$this->load->view('template',$data);

	}

   public function alta_vendedor(){

		$this->form_validation->set_rules('usuario', 'Usuario', 'strip_tags|trim|callback_masQweb|required|valid_email');
        $this->form_validation->set_rules('clave', 'Clave', 'strip_tags|trim|required|matches[claveconf]|md5');
        $this->form_validation->set_rules('claveconf', 'Clave Confirmada', 'strip_tags|trim|required|md5');
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
		$this->form_validation->set_rules('zona', 'Zona', 'strip_tags|trim|required');
       
        $vendedor = new Usuario();
 		$datosGenerales = new Datos_general();
       
 		$data['title'] = "pagina de registro";
		$data['view']  = "alta_vendedor";
  
if ($this->form_validation->run() === false){

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
			$datosGenerales->zona          = $this->input->post('zona');
			$datosGenerales->status        = $this->input->post('status');

			if ($datosGenerales->save()){

				$vendedor->usuario          = $this->input->post('usuario');
				$vendedor->clave            = $this->input->post('clave');
				$vendedor->status           = 1;
				$vendedor->es_admin         = 0;
				$vendedor->datos_general_id = $datosGenerales->id;
				$vendedor->save();				
	
			}
				redirect(base_url('login'));

		}

	}

    public function editar_vendedor($id_vendedor)
	{
 		
 		if(!$this->session->userdata('id_user')){
    		redirect(base_url('login'));
    	}

    	$this->form_validation->set_rules('usuario', 'Usuario', 'strip_tags|trim|required[usuarios.usuario]|valid_email');
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
		$this->form_validation->set_rules('zona', 'Zona', 'strip_tags|trim|required');

        $vendedor = new Usuario();
 		$datosGenerales = new Datos_general();
       
		$oVendedor = $vendedor->where('id', $id_vendedor)->get();

		if ($this->form_validation->run() === false){

			$data['aVendedor']   = $oVendedor;
			$data['error_message'] = "";
			$data['title'] = "pagina de registro";
		    $data['view']  = "editar_vendedor";
		    
			$this->load->view('template', $data);

		} else {

			$oVendedor->datos_general->get();

			$oVendedor->nombre = $this->input->post('usuario');
			if($this->input->post('status') && $this->input->post('status') == 1){
		  		$status = 1;
			}else{
  				$status = 0;
			}
			$oVendedor->status = $status;

			$oVendedor->datos_general->nombre       = $this->input->post('nombre');
			$oVendedor->datos_general->apellido_p   = $this->input->post('apat');
			$oVendedor->datos_general->apellido_m   = $this->input->post('amat');
		    $oVendedor->datos_general->email        = $this->input->post('email');
            $oVendedor->datos_general->lada1        = $this->input->post('lada1');
            $oVendedor->datos_general->telefono1    = $this->input->post('telefono1');
	        $oVendedor->datos_general->ext1         = $this->input->post('ext1');
	        $oVendedor->datos_general->lada2        = $this->input->post('lada2');
	        $oVendedor->datos_general->telefono2    = $this->input->post('telefono2');
		    $oVendedor->datos_general->ext2         = $this->input->post('ext2');
			$oVendedor->datos_general->direccion    = $this->input->post('direccion');
			$oVendedor->datos_general->zona         = $this->input->post('zona');

			if ($oVendedor->save() && $oVendedor->datos_general->save()){
				redirect(base_url('vendedores'));
			}

		}

	}
}



















	