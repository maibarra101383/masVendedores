<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Requerimientos extends CI_Controller{

	public function __construct()
    {
    	parent::__construct();
    	if(!$this->session->userdata('id_user')){
    		//redirect(base_url('login'));
    	}
    }

	public function index($id_vendedor = NULL)
	{

		$clientes = new Cliente();

		if($id_vendedor == NULL){
    		$data['aClientes'] = $clientes->where('usuario_id', $this->session->userdata('id_user'))->get();
    	} else {
    		$data['aClientes'] = $clientes->where('usuario_id', $id_vendedor)->get();
    	}
    	       

    	       $data['view'] = 'sistema/lista_clientes';
    	       $data['cssFiles']  = array('themes/base/jquery-ui.css','style.css','sistema.css');
               $data['jsFiles']   = array('jquery.js', 
            						   'jquery-ui/ui/jquery-ui.js',
            						   'jquery-timepicker.js');

               
		$this->load->view('template',$data);
		$oRequerimiento->fecha_a = date("Y-m-d H:i:s");


	}


    public function editar_requerimiento($id_cliente)
	{
 		
 		if(!$this->session->userdata('id_user')){
    		redirect(base_url('login'));
    	}

		$clientes        = new Cliente();
        $requerimientos  = new Requerimiento();
        $clienteProducto = new Cliente_producto(); 

		$oCliente       = $clientes->where('id', $id_cliente)->get();
        $oRequerimiento = $requerimientos->where('cliente_id',$id_cliente)->get();

		if (!$this->input->post()){
    
			$data['aCliente']         = $oCliente;
			$data['aRequerimiento']   = $oRequerimiento;

			$data['error_message'] = "";
			$data['title'] = "pagina de registro";

		    $data['view']      = "sistema/editar_requerimiento";
		    $data['cssFiles']  = array('themes/base/jquery-ui.css','style.css','sistema.css');
            $data['jsFiles']   = array('jquery.js', 
            						   'jquery-ui/ui/jquery-ui.js',
            						   'jquery-timepicker.js');
		    
			$this->load->view('template', $data);

		} else {
			$requerimientosDelete  = new Requerimiento();
			
			if(!$requerimientosDelete->where('cliente_id',$id_cliente)->get()->delete()){
					echo $requerimientosDelete->error->string;
			}

			$oCliente->producto->get();

		  	foreach ($oCliente->producto->all as $producto){

		  		$requerimientosEdit  = new Requerimiento();

		  		$requerimientosEdit->notas       = $this->input->post('nota_'.$producto->id);
				$requerimientosEdit->usuario_id  = $this->input->post('usuario');
				$requerimientosEdit->cliente_id  = $id_cliente;
				$requerimientosEdit->descripcion = $this->input->post('des_'.$producto->id);
		 		$requerimientosEdit->fecha_m     = date("Y-m-d H:i:s");
		 		$requerimientosEdit->save();

		 		$clienteProducto->where(array('cliente_id'  => $id_cliente,
		 									  'producto_id' => $producto->id))->get();

		 		$clienteProducto->requerimiento_id = $requerimientosEdit->id;

		           if ($clienteProducto->save()){
						
					}

			}

			redirect(base_url('clientes/index/1/'.$id_vendedor));

	}
  }
}