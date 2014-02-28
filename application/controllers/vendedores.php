<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vendedores extends CI_Controller{

	public function __construct()
    {
    	parent::__construct();
    	if(!$this->session->userdata('id_user')){
    		
    		
    	}
    }
	
	public function index($page = 1, $id_vendedor = NULL)
	{       
		 if($this->session->userdata('admin')==0)        		

		{
    		redirect(base_url('clientes'));
    	}

        $vendedor = new Usuario();

     
    	$data['aVendedores'] = $vendedor->get();

        $data['view']      = 'sistema/lista_vendedores';
        $data['cssFiles']  = array('themes/base/jquery-ui.css','style.css','sistema.css');
        $data['jsFiles']   = array('jquery.js', 
            					   'jquery-ui/ui/jquery-ui.js',
            					   'jquery-timepicker.js');
        $data['return']    = 'clientes/index/1/'.$vendedor; 



           
    		$vendedor->get_paged_iterated($page,10);

    		$data['aVendedores'] = $vendedor;
    	
		
				
		$data['paginaActual'] = $page;        
        $data['view']         ='sistema/lista_vendedores';
    	$data['cssFiles']     = array('themes/base/jquery-ui.css','sistema.css','style.css');
        $data['jsFiles']      = array('jquery.js', 
            					   'jquery-ui/ui/jquery-ui.js',
            					'jquery-timepicker.js','jquery.ui.datepicker-es.js');
    	$data['return']       = 'vendedor/index/'.$id_vendedor; 





		if($this->input->post()){
			
			

			$input_count = 0;

			foreach ($this->input->post() as $input_name => $input) {
				if($input_name != 'buscar' && $input_name != 'usuario_value' && $input != ''){
			 		$vendedor->like($input_name, $input);
			 		$input_count++;
			 	}
			 } 

			if($input_count > 0){
				/*if($id_vendedor == NULL){
					$clientes->where('usuario_id',$this->session->userdata('id_user'));
				} else {
					$clientes->where('usuario_id',$id_vendedor);
				}*/
				$vendedor->order_by('usuario');
				$vendedor->get_paged_iterated($page, 8);

		
				$data['paginaActual'] = $page;
				$data['buscar']       = true;


			}

		}
			$this->load->view('template',$data);
	
    }

   public function alta_vendedor(){

        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
		$this->form_validation->set_rules('usuario', 'Usuario', 'strip_tags|trim|callback_masQweb|required|valid_email');
        $this->form_validation->set_rules('clave', 'Clave', 'strip_tags|trim|required|matches[claveconf]|md5');
        $this->form_validation->set_rules('claveconf', 'Clave Confirmada', 'strip_tags|trim|required|md5');
        $this->form_validation->set_rules('nombre', 'Nombre', 'strip_tags|trim|required|ctype_alpha');
		$this->form_validation->set_rules('apat', 'Apellido Paterno', 'strip_tags|trim|required|ctype_alpha');
		$this->form_validation->set_rules('amat', 'Apellido Materno', 'strip_tags|trim|required|ctype_alpha');
		$this->form_validation->set_rules('email', 'Email', 'strip_tags|trim|required|valid_email');
		$this->form_validation->set_rules('lada1', 'Lada 1', 'strip_tags|trim|numeric|max_length[5]');
		$this->form_validation->set_rules('telefono1', 'Teléfono 1', 'strip_tags|trim|required|ctype_alnum_plus|max_length[13]');
		$this->form_validation->set_rules('ext1', 'Extención 1', 'strip_tags|trim|numeric|max_length[5]');
		$this->form_validation->set_rules('lada2', 'Lada 2', 'strip_tags|trim|numeric|max_length[5]');
		$this->form_validation->set_rules('telefono2', 'Teléfono 2', 'strip_tags|trim|ctype_alnum_plus|max_length[13]');
		$this->form_validation->set_rules('ext2', 'Extención 2', 'strip_tags|trim|numeric|max_length[5]');
		$this->form_validation->set_rules('direccion', 'Dirección', 'strip_tags|trim|required');
		$this->form_validation->set_rules('zona', 'Zona', 'strip_tags|trim|required|ctype_alnum_plus');
       
        $vendedor = new Usuario();
 		$datosGenerales = new Datos_general();

       
 		$data['title'] = "pagina de registro";
		$data['view']  = "sistema/alta_vendedor";
		$data['cssFiles']  = array('themes/base/jquery-ui.css','sistema.css');
            $data['jsFiles']   = array('jquery.js', 
            						   'jquery-ui/ui/jquery-ui.js',
            						   'jquery-timepicker.js');
            //$data['return']       = 'vendedores/index/1/'.$id_vendedor; 
  
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

    public function editar_vendedor($id_vendedor){
 		
 		 if(!$this->session->userdata('id_user')){
    		redirect(base_url('login'));
    	 }
        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
    	$this->form_validation->set_rules('usuario', 'Usuario', 'strip_tags|trim|required[usuarios.usuario]|valid_email');
    	$this->form_validation->set_rules('nombre', 'Nombre', 'strip_tags|trim|required|ctype_alpha');
		$this->form_validation->set_rules('apat', 'Apellido Paterno', 'strip_tags|trim|required|ctype_alpha');
		$this->form_validation->set_rules('amat', 'Apellido Materno', 'strip_tags|trim|required|ctype_alpha');
		$this->form_validation->set_rules('email', 'Email', 'strip_tags|trim|required|valid_email');
		$this->form_validation->set_rules('lada1', 'Lada 1', 'strip_tags|trim|numeric|max_length[5]');
		$this->form_validation->set_rules('telefono1', 'Teléfono 1', 'strip_tags|trim|required|ctype_alnum_plus|max_length[13]');
		$this->form_validation->set_rules('ext1', 'Extención 1', 'strip_tags|trim|numeric|max_length[5]');
		$this->form_validation->set_rules('lada2', 'Lada 2', 'strip_tags|trim|numeric|max_length[5]');
		$this->form_validation->set_rules('telefono2', 'Teléfono 2', 'strip_tags|trim|ctype_alnum_plus|max_length[13]');
		$this->form_validation->set_rules('ext2', 'Extención 2', 'strip_tags|trim|numeric|max_length[5]');
		$this->form_validation->set_rules('direccion', 'Dirección', 'strip_tags|trim|required');
		$this->form_validation->set_rules('zona', 'Zona', 'strip_tags|trim|required|ctype_alnum_plus');

        $vendedor = new Usuario();
 		$datosGenerales = new Datos_general();
       
		$oVendedor = $vendedor->where('id', $id_vendedor)->get();

		if ($this->form_validation->run() === false){

			$data['aVendedor']   = $oVendedor;
			$data['error_message'] = "";
			$data['title'] = "pagina de registro";
		    $data['view']  = "sistema/editar_vendedor";
		    $data['cssFiles']  = array('themes/base/jquery-ui.css','sistema.css','sistema.css');
            $data['jsFiles']   = array('jquery.js', 
            						   'jquery-ui/ui/jquery-ui.js',
            						   'jquery-timepicker.js');
            $data['return']       = 'vendedores/index/1/'.$id_vendedor; 
		    
			$this->load->view('template', $data);

		} else {

			$oVendedor->datos_general->get();
            $vendedor->usuario  = $this->input->post('usuario');
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

	public function historial(){

		if(!$this->session->userdata('id_user')){
    		redirect(base_url('login'));

    	 }

    	$cliente = new Cliente();
    	$vendedor= new Usuario();
    	$citas   = new Cita();   


    	//$cliente->where('usuario_id', $cliente)->order_by('fecha_v', 'DESC')->get();

    	$data['aVendedores'] = $vendedor->get();
    	$data['aClientes']   = $cliente->get();
    	$data['aCitas']		 = $citas->get();
 		$data['title']       = "historial";
		$data['view']        = "sistema/historial";
		$data['cssFiles']    = array('themes/base/jquery-ui.css','sistema.css');
        $data['jsFiles']     = array('jquery.js', 
            					   'jquery-ui/ui/jquery-ui.js',
            					   'jquery-timepicker.js','jquery.ui.datepicker-es.js');

        $data['error_message'] = "";
       
        
			$this->load->view('template', $data);
 	}


 	/*public function detalle($page = 1, $id_vendedor=NULL){  
// Clases Php 
 	require_once("PHPExcel.php"); 
 	require_once("PHPExcel/Reader/Excel2007.php");
 	 // Cargando el excel 
 	$objPHPExcel = $objReader->load($archivo_loc.$archivo_nom);
 	 //cargamos el archivo excel (extensión *.xlsx) 
 	$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
 	//objeto de PHPExcel, para escribir en el excel 

	//Extraemos los registros de la base de datos mysql 
	$objPHPExcel->getActiveSheet()->setCellValue("A".$i, $fila[nombre]);
	$objPHPExcel->getActiveSheet()->setCellValue("B".$i, $fila[email]); 
	$objPHPExcel->getActiveSheet()->setCellValue("C".$i, $fila[telefono]); } 	 
	$objWriter->save($archivo_loc.$archivo_nom);
	//guardamos el archivo excel     

  if(!$id_vendedor){

			$clientes->where('usuario_id', $this->session->userdata('id_user'));

    	} else {

			$clientes->where('usuario_id',  $id_vendedor);

    	}

$clientes->order_by ('TIMESTAMPDIFF(MINUTE,fecha_v ,now())ASC');
$clientes->get();    		 

 $html  = $this->_estilo().' <table class="table">';
 $html.="<br>";
 $html.="<br>";
 $html.="<br>";
 $html .= '<thead>';
 $html .= '<tr>';
 $html .= '<th class="th">Cliente</th>';
 $html .= '<th class="th">Giro</th>';
 $html .= '<th class="th">Nombre</th>';
 $html .= '<th class="th">Teléfono</th>';
 $html .= '<th class="th">Dirección</th>';
 $html .= '<th class="th">Delegacion/Municipio</th>';
 $html .= '<th class="th">Fecha visita</th>';
 $html .= '</tr>';
 $html .= '</thead>';
 $html .= '<tbody>'; 

 
foreach($clientes->all as $cliente){
	    $cliente->datos_general->get();


				/*foreach($productos->all as $producto){

					$productos->where(array('cliente_id' =>$id,
												'producto_id' => $productos->id))->get();*/
	         /* $html.="<br>";
	          $html.="<br>";
              $html.="<tr><td>".$cliente->nombre."</td>";
              $html.="<td>".$cliente->giro_empresa."</td>";
              $html.="<td>".$cliente->datos_general->nombre." ".$cliente->datos_general->apellido_p." ".$cliente->datos_general->apellido_m."</td>";
              $html.="<td>"."(".$cliente->datos_general->lada1.") ".$cliente->datos_general->telefono1." "."ext.".$cliente->datos_general->ext1."</td>";
              $html.="<td>".$cliente->datos_general->direccion."</td>";
              $html.="<td>".$cliente->datos_general->zona."</td>";
              $html.="<td>".$cliente->fecha_v."</td></tr>";
              /*$html.="<td>".$producto->productos->nombre."</td>    
            }*/
        //}
            /* $html .= '</tbody>'; 
            $html .= "</table>";
           
 
// Imprimimos el texto con writeHTMLCell()
$pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '40%', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
 
// ---------------------------------------------------------
// Cerrar el documento PDF y preparamos la salida
// Este método tiene varias opciones, consulte la documentación para más información.
        $nombre_archivo = utf8_decode("archivo.pdf");
        $pdf->Output($nombre_archivo, 'I');
    }*/

    /*private function _estilo(){
     
     return " <style> 
          
        .table {
          width: 100%; 
        }

        th {
  background:-webkit-gradient( linear, left top, left bottom, color-stop(0.04, #006699),
   color-stop(1, #00557F) );
  background:-moz-linear-gradient( center top, #006699 5%, #00557F 100% );
  background: #ddd; 

  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#006699', endColorstr='#00557F')
        ;background-color:#006699; color:#FFFFFF; font-size: 9px; font-weight: bold; border-left: 1px solid #0070A8; }

        .td {
        padding: 3px 5px;
        font-size: 6px;
        border: 0.5px solid #0070A8;
        background: #fff;
        }

        .even {
            background: #ddd;  
        }

odd { 
	background: #fff;
}

    </style>";

    }*/
}