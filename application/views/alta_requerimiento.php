<h1>Requerimiento para propuesta de solución</h1> 
<div id="login_form" 
	 style="width:700px; margin:100px auto; border-radius:5px; border:1px solid #909090; pading:20px" >

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
   print_r($clientes->get();)exit;


            /*echo form_label('Fecha de Contacto : ');
		 	$data = array(
		 		'name'  => 'fecha_c_show',
		 		'id'    => 'fecha_c_show',
		 		'value' => set_value('fecha_c_show'),
		 		'style' => 'width:18%'
		 	);

		 	echo form_input($data);
		 	echo form_error('fecha_c_show');



		 	 echo form_label('<br><br>Fecha de Visita : ');
		 	$data = array(
		 		'name'  => 'fecha_v_show',
		 		'id'    => 'fecha_v_show',
		 		'value' => set_value('fecha_v_show'),
		 		'style' => 'width:30%'
		 	);

		 	echo form_input($data);
		 	echo form_error('fecha_v_show');


		 	

            echo form_label('<br><br>Proyecto en Proceso :  ');
		 	$data = array(
		 		'name'  => 'status',
		 		'id'    => 'status',
		 		'value' => 1,
		 		'style' => 'width:100%'
		 	);

		 	echo form_checkbox($data);*/


             echo form_label(' <br><br>  PRODUCTOS:  <br><br>');

             foreach($aProductos as $aItem){

            	echo form_label($aItem->nombre);

            	$data = array(
                	'name'        => 'productos[]',
                	'value'       => $aItem->id, 
                	'style'       => 'margin:10px',
            	);

            	 echo form_checkbox($data);	
          echo form_label(' <br><br>  DESCRIPCION:  <br><br>');

          $data = array(
		 		'name'  => 'des',
		 		'id'    => 'des',
		 		'style' => 'width:100%'
		 	);

		 	echo form_textarea($data);
         // <textarea id="textarea_comunicacion" name="comunicacion" rows="10" cols="50"></textarea>

          echo form_label(' <br><br>  NOTAS:  <br><br>');

          $data = array(
		 		'name'  => 'nota',
		 		'id'    => 'nota',
		 		'style' => 'width:100%'
		 	);

		 	echo form_textarea($data);


             }

                $data = array(
		 		'name'  => 'login',
		 		'id'    => 'login',
		 		'value' => 'Registro',
		 		'style' => 'width:100%'
		 	);

		 	echo form_submit($data);

 /*echo '<input name="fecha_v" type="hidden" id="fecha_v" />';
 echo '<input name="fecha_c" type="hidden" id="fecha_c" />';*/
 echo form_close(); 
	 	
	 ?>
</div>

