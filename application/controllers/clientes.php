<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clientes extends CI_Controller{

	public function __construct()
    {
    	parent::__construct();
    	if(!$this->session->userdata('id_user')){
    		redirect(base_url('login'));
    	}
    }

	public function index($page = 1, $id_vendedor = NULL)
	{

		$clientes = new Cliente();
		

		if($id_vendedor == NULL){

			$clientes->where('usuario_id', $this->session->userdata('id_user'));
			$clientes->order_by ('TIMESTAMPDIFF(MINUTE,fecha_a ,now())DESC');
    		$clientes->limit('10');
    		$clientes->get_paged_iterated($page,10);

    		$data['aClientes'] = $clientes;

    	} else {

			$clientes->where('usuario_id', $id_vendedor);
    		$clientes->order_by ('TIMESTAMPDIFF(MINUTE,fecha_a ,now())DESC');
    		$clientes->limit('10');
           
    		$clientes->get_paged_iterated($page,10);

    		$data['aClientes'] = $clientes;
    	}
		
		$data['id_vendedor']  = $id_vendedor;		
		$data['paginaActual'] = $page;        
        $data['view']         ='sistema/lista_clientes';
    	$data['cssFiles']  = array('themes/base/jquery-ui.css','sistema.css','style.css');
        $data['jsFiles']   = array('jquery.js', 
            					   'jquery-ui/ui/jquery-ui.js',
            					'jquery-timepicker.js','jquery.ui.datepicker-es.js');
    	$data['return']       = 'clientes/index/1/'.$id_vendedor; 





		if($this->input->post()){
			
			

			$input_count = 0;

			foreach ($this->input->post() as $input_name => $input) {
				if($input_name != 'buscar' && $input_name != 'nombre_value' && $input != ''){
			 		$clientes->like($input_name, $input);
			 		$input_count++;
			 	}
			 } 

			if($input_count > 0){
				if($id_vendedor == NULL){
					$clientes->where('usuario_id',$this->session->userdata('id_user'));
				} else {
					$clientes->where('usuario_id',$id_vendedor);
				}
				$clientes->order_by('nombre');
				$clientes->get_paged_iterated($page, 8);

		
				$data['paginaActual'] = $page;
				$data['buscar']       = true;


			}

		}
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
				$clientes->save($productos->all)&& $clientes->save();

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
    	$this->form_validation->set_rules('cliente', 'Cliente', 'strip_tags|trim|required|ctype_alpha');
    	$this->form_validation->set_rules('nombre', 'Nombre', 'strip_tags|trim|required|ctype_alpha');
		$this->form_validation->set_rules('apat', 'Apellido Paterno', 'strip_tags|trim|required|ctype_alpha');
		$this->form_validation->set_rules('amat', 'Apellido Materno', 'strip_tags|trim|required|ctype_alpha');
		$this->form_validation->set_rules('email', 'Email', 'strip_tags|trim|required|valid_email');
		$this->form_validation->set_rules('lada1', 'Lada 1', 'strip_tags|trim|ctype_alnum_plus|max_length[5]');
		$this->form_validation->set_rules('telefono1', 'Teléfono 1', 'strip_tags|trim|required|ctype_alnum_plus|max_length[13]');
		$this->form_validation->set_rules('ext1', 'Extención 1', 'strip_tags|trim|ctype_alnum_plus|max_length[5]');
		$this->form_validation->set_rules('lada2', 'Lada 2', 'strip_tags|trim|ctype_alnum_plus|max_length[5]');
		$this->form_validation->set_rules('telefono2', 'Teléfono 2', 'strip_tags|trim|ctype_alnum_plus|max_length[13]');
		$this->form_validation->set_rules('ext2', 'Extención 2', 'strip_tags|trim|ctype_alnum_plus|max_length[5]');
		$this->form_validation->set_rules('direccion', 'Dirección', 'strip_tags|trim|required');
        $this->form_validation->set_rules('cargo_cliente', 'Cargo del Cliente', 'strip_tags|trim|required|ctype_alpha');
        $this->form_validation->set_rules('giro_empresa', 'Giro de la Empresa', 'strip_tags|trim|required|ctype_alpha');
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


			if ($oCliente->save($productos->all) && $oCliente->datos_general->save()
				                                 && $oCliente->save()){


				redirect(base_url('clientes/index/'.$id_vendedor));
			}

		}
	}	


 
    public function pdf()
    {     
    	$clientes = new Cliente();
$clientes->where('usuario_id', $this->session->userdata('id_user'))->get();
 $clientes->datos_general->get();  

  $html = ''; 
  $html .= "<table>";
 
foreach($clientes->all as $cliente){
	   
              $html.="<tr><td>".$clientes->nombre."</td>";
              $html.="<td>".$cliente->cargo_cliente."</td>";
              $html.="<td>".$cliente->giro_empresa."</td>";
              $html.="<td>".$clientes->datos_general->nombre."</td>";
              $html.="<td>".$clientes->datos_general->apellido_p."</td>";
              $html.="<td>".$clientes->datos_general->apellido_m."</td>";
              $html.="<td>".$clientes->datos_general->email."</td>";
              $html.="<td>".$clientes->datos_general->lada1."</td>";
              $html.="<td>".$clientes->datos_general->telefono1."</td>";
              $html.="<td>".$clientes->datos_general->ext1."</td>";
              $html.="<td>".$clientes->datos_general->lada2."</td>";
              $html.="<td>".$clientes->datos_general->telefono2."</td>";
              $html.="<td>".$clientes->datos_general->ext2."</td></tr>";
             

        
                      
            }
            $html .= "</table>";
         

             //print_r($html);

        $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Israel Parra');
        $pdf->SetTitle('Ejemplo de provincías con TCPDF');
        $pdf->SetSubject('Tutorial TCPDF');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
 
// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config_alt.php de libraries/config
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 001', PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));
        $pdf->setFooterData($tc = array(0, 64, 0), $lc = array(0, 64, 128));
 
// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
 
// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
 
// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
 
// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
 
//relación utilizada para ajustar la conversión de los píxeles
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
 
 
// ---------------------------------------------------------
// establecer el modo de fuente por defecto
        $pdf->setFontSubsetting(true);
 
// Establecer el tipo de letra
 
//Si tienes que imprimir carácteres ASCII estándar, puede utilizar las fuentes básicas como
// Helvetica para reducir el tamaño del archivo.
        $pdf->SetFont('freemono', '', 14, '', true);
 
// Añadir una página
// Este método tiene varias opciones, consulta la documentación para más información.
        $pdf->AddPage();
 
//fijar efecto de sombra en el texto
        $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));
 
// Establecemos el contenido para imprimir
  
 
// Imprimimos el texto con writeHTMLCell()
$pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
 
// ---------------------------------------------------------
// Cerrar el documento PDF y preparamos la salida
// Este método tiene varias opciones, consulte la documentación para más información.
        $nombre_archivo = utf8_decode("archivo.pdf");
        $pdf->Output($nombre_archivo, 'I');
    }
}
    