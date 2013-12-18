<body id="wrapper_cli">
<h3>Requerimiento para propuesta de solución</h3> 
<a href="<?= base_url('clientes/'); ?>">Regresar a Lista Clientes</a>
<div id="login_form" 
	 style="width:700px; margin:100px auto; border-radius:5px; border:5px solid #58ACFA; pading:20px" >

	 <?php
	 	/*if (isset($error_menssage)){
	 		echo '<p>'.$error_menssage.'</p>';
	 	}*/
	 	echo form_label('DATOS DEL CLIENTE <br><br>');
	 	echo form_open();
            
           
            echo form_label('Nombre de la Empresa : ');
		 	 echo form_label ($aCliente->nombre);
		 	 
            $aCliente->datos_general->get();
            echo form_label(' <br><br> DATOS GENERALES DEL CONTACTO  <br><br>');
             echo form_label('Nombre: ');
             echo form_label ($aCliente->datos_general->nombre);
            


            echo form_label('<br><br>Apellido Paterno : ');
		  echo form_label ($aCliente->datos_general->apellido_p );


		 	echo form_label('<br><br>Apellido Materno : ');
		 echo form_label ($aCliente->datos_general->apellido_m );
           


            echo form_label('<br><br>Email : ');
		 echo form_label ($aCliente->datos_general->email);


             
		 	 echo form_label('<br><br>Dirección : ');
		 	 echo form_label ($aCliente->datos_general->direccion);


		 	echo form_label('<br><br>Cargo del Cliente : ');
		echo form_label ($aCliente->datos_general->cargo_cliente );


		 		 echo form_label('<br><br>Giro de la Empresa : ');
		  echo form_label ($aCliente->datos_general->giro_empresa);

             echo form_label(' <br><br>  PRODUCTOS:  <br><br>');


             $prod_cli  = $aCliente->producto->get();
             $valid_req = new Cliente_producto();

			foreach ($prod_cli as $prod){

				$valid_req->where(array('producto_id' => $prod->id, 
										'cliente_id'  => $aCliente->id))->get();                

          echo  form_label($prod->nombre);

          if($valid_req->requerimiento_id == 0){
          	echo '<a href="'.base_url('requerimientos/alta_requerimiento/'.$prod->id.'/'.$aCliente->id).'" style="text-decoration:none"> 
          	 		<img src="'.base_url('assets/imagenes/agregar.png').'" width="20" height="20"/> 
          	 	  </a>';
          } else {
          	echo '<a href="'.base_url('requerimientos/editar_requerimiento/'.$valid_req->requerimiento_id).'" style="text-decoration:none"> 
          	 		<img src="'.base_url('assets/imagenes/Edit.png').'" width="20" height="20"/> 
          	 	  </a>';
          }
		  


             }

                $data = array(
		 		'name'  => 'login',
		 		'id'    => 'login',
		 		'value' => 'Guardar',
		 		'style' => 'width:100%'
		 	);

		 	echo form_submit($data);




		  	$data = array(
		 		'usuario'  => $aCliente->usuario_id
		 	);
	 echo form_hidden ($data);
 echo form_close(); 
	 	
	 ?>
</div>

