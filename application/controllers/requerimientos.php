<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Requerimientos extends CI_Controller{

	public function __construct()
    {
    	parent::__construct();
    	if(!$this->session->userdata('id_user')){
    		redirect(base_url('login'));
    	}
    	define("FILEPATH", "/var/www/masVendedores/propuestas/");
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

 public function editar_requerimiento($id_requerimiento=null, $id_cliente = null)
	{
 		
 		if(!$this->session->userdata('id_user')){
    		redirect(base_url('login'));
    	}

		
        $requerimientos  = new Requerimiento(); 
	
        $oRequerimiento = $requerimientos->where('id',$id_requerimiento)->get();

		if (!$this->input->post()){
			
			$data['oRequerimiento'] = $oRequerimiento;
             $data['id_cliente'] = $id_cliente;
             $data['id_requerimiento'] = $id_requerimiento;
			$data['error_message']  = "";
			$data['title']          = "pagina de registro";

		    $data['view']      = "sistema/editar_requerimiento";
		    $data['cssFiles']  = array('themes/base/jquery-ui.css','sistema.css');
            $data['jsFiles']   = array('jquery.js', 
            						   'jquery-ui/ui/jquery-ui.js',
            						   'jquery-timepicker.js');
		    
			$this->load->view('template', $data);

		} else {

			if($_FILES['userfile']['error'] == 0){ 

				$config['upload_path']   = FILEPATH;
				$config['allowed_types'] = 'pdf|ppt';
				$config['file_name']     = $_FILES['userfile']['name'];
				$config['max_size']	     = '3000';
                
				$this->load->library('upload', $config);
				
				

				if ( ! $this->upload->do_upload())
				{
					$error = array('error' => $this->upload->display_errors());
					print_r($error);
					exit();
				} else {
					$oRequerimiento->propuesta   =  $_FILES['userfile']['name'];
				}			

			}

	  		$oRequerimiento->notas       = $this->input->post('nota');
			$oRequerimiento->descripcion = $this->input->post('des');
	 		$oRequerimiento->fecha_m     = date("Y-m-d H:i:s");

	 		if ($oRequerimiento->save()){
	 		
	 			redirect(base_url('requerimientos/requerimiento/'.$id_cliente));
	 		}

		}
}


 public function alta_requerimiento($id_producto = null, $id_cliente = null)
	{
 		
 		if(!$this->session->userdata('id_user')){
    		redirect(base_url('login'));
    	}

        $requerimientos  = new Requerimiento(); 

		if (!$this->input->post()){

			$data['id_cliente'] = $id_cliente;
			$data['title']      = "pagina de registro";
		    $data['view']      = "sistema/alta_requerimiento";
		    $data['cssFiles']  = array('themes/base/jquery-ui.css','style.css','sistema.css');
            $data['jsFiles']   = array('jquery.js', 
            						   'jquery-ui/ui/jquery-ui.js',
            						   'jquery-timepicker.js');
		    
			$this->load->view('template', $data);

		} else {

	  		$requerimientos->notas       = $this->input->post('nota');
			$requerimientos->descripcion = $this->input->post('des');
			$requerimientos->cliente_id  = $id_cliente;
			$requerimientos->usuario_id  = $this->session->userdata('id_user');
			$requerimientos->fecha_a     = date("Y-m-d H:i:s");
	 	
	 		if ($requerimientos->save()){

	 			$clienteProducto  = new Cliente_producto();

	 			$clienteProducto->where(array('cliente_id'  => $id_cliente,
		 		   							  'producto_id' => $id_producto))->get();

	 			$clienteProducto->requerimiento_id = $requerimientos->id;

	 			if ($clienteProducto->save()){
	 				$this->_sendEmail($id_requerimiento);

	 				redirect(base_url('requerimientos/requerimiento/'.$id_cliente));

	 			}
	 		}

	}
  }



         public function requerimiento($id_cliente=null)
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
            $data['id_cliente']       = $id_cliente;
			$data['aCliente']         = $oCliente;
			$data['aRequerimiento']   = $oRequerimiento;

			$data['error_message'] = "";
			$data['title'] = "pagina de registro";

		    $data['view']      = "sistema/requerimiento";
		    $data['cssFiles']  = array('themes/base/jquery-ui.css','sistema.css');
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
				$requerimientosEdit->cliente_id  = $clienteProducto->cliente_id;
				$requerimientosEdit->descripcion = $this->input->post('des_'.$producto->id);
		 		$requerimientosEdit->fecha_m     = date("Y-m-d H:i:s");
		 		$requerimientosEdit->save();



		 		$clienteProducto->where(array('cliente_id'  => $id_cliente,
		 									  'producto_id' => $producto->id))->get();

		 		$clienteProducto->requerimiento_id = $requerimientosEdit->id;

		           if ($clienteProducto->save()){
					


	 				

	 			}

				redirect(base_url('requerimientos/requerimiento/'.$id_cliente));
	

			}

	

	}
  }

	private function _sendEmail($id_requerimiento){

		$config = Array(
						'protocol'  => 'smtp',
				        'smtp_host' => 'ssl://smtp.googlemail.com',
				        'smtp_port' => 465,
				        'smtp_user' => 'masqwebemail@gmail.com',
				        'smtp_pass' => 'masqweb123',
				        'mailtype'  => 'html', 
				        'charset'   => 'utf-8',
				        'wordwrap'  => TRUE

				    );

				    $this->load->library('email', $config);
				    $this->email->set_newline("\r\n");
				    $email_setting  = array('mailtype'=>'html');
				    $this->email->initialize($email_setting);

				    $email_body ='<div>Se ha creado un nuevo Requerimiento
				    				<a href="'.base_url('requerimientos/editar_requerimiento/'.$id_requerimiento).'">Ver Requerimiento</a>
				    			</div>';

				    $this->email->from('masqwebemail@gmail.com', 'Sistema masContactos');
                      $this->email->to('ventas[A2] @masqweb.com');
				    $this->email->bcc('recursoshumanos@masqweb.com');
				    $this->email->subject('Nuevo Requerimiento');
				    $this->email->message($email_body);

				    if($this->email->send()){
				    	return true;
				    }else {
				    	return $this->email->print_debugger();
					}

	}
}