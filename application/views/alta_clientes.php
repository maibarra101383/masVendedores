<div id="login_form" 
	 style="width:400px; margin:100px auto; border-radius:5px; border:1px solid #909090; pading:20px" >

	 <?php
	 	/*if (isset($error_menssage)){
	 		echo '<p>'.$error_menssage.'</p>';
	 	}*/
	 	echo form_label('DATOS DEL CLIENTE ');
	 	echo form_open();
            
            
            echo form_label('Nombre del Cliente : ');
		 	$data = array(
		 		'name'  => 'usuario',
		 		'id'    => 'usuario',
		 		'value' => set_value('usuario'),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('usuario');
            
            echo form_label('  DATOS GENERALES DEL CLIENTE  ');

            echo form_label('Nombre : ');
		 	$data = array(
		 		'name'  => 'nombre',
		 		'id'    => 'nombre',
		 		'value' => set_value('nombre'),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('usuario');


            echo form_label('Apellido Paterno : ');
		 	$data = array(
		 		'name'  => 'apat',
		 		'id'    => 'apat',
		 		'value' => set_value('apat'),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('apat');


		 	echo form_label('Apellido Materno : ');
		 	$data = array(
		 		'name'  => 'amat',
		 		'id'    => 'amat',
		 		'value' => set_value('amat'),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('amat');
           


            echo form_label('Email : ');
		 	$data = array(
		 		'name'  => 'email',
		 		'id'    => 'email',
		 		'value' => set_value('email'),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('email');


              echo form_label('Telefono : ');
		 	$data = array(
		 		'name'  => 'telefono',
		 		'id'    => 'telefono',
		 		'value' => set_value('telefono'),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('telefono');

		 	  echo form_label('Telefono2 : ');
		 	$data = array(
		 		'name'  => 'telefono2',
		 		'id'    => 'telefono2',
		 		'value' => set_value('telefono2'),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('telefono2');


		 	 echo form_label('Direccion : ');
		 	$data = array(
		 		'name'  => 'direccion',
		 		'id'    => 'direccion',
		 		'value' => set_value('direccion'),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('direccion');


		 	echo form_label('Cargo del Cliente : ');
		 	$data = array(
		 		'name'  => 'cargo del cliente',
		 		'id'    => 'cargo del cliente',
		 		'value' => set_value('cargo del cliente'),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('cargo del cliente');


		 		 echo form_label('Giro de la Empresa : ');
		 	$data = array(
		 		'name'  => 'giro de la empresa',
		 		'id'    => 'giro de la empresa',
		 		'value' => set_value('giro de la empresa'),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('giro de la empresa');


             echo form_label('  PRODUCTOS ');

             foreach($aProductos as $aItem){

            	echo form_label($aItem['nombre']);

            	$data = array(
                	'name'        => 'productos[]',
                	'value'       => $aItem['id _producto'], 
                	'style'       => 'margin:10px',
            	);

            	 echo form_checkbox($data);	
             }

                $data = array(
		 		'name'  => 'login',
		 		'id'    => 'login',
		 		'value' => 'Registro',
		 		'style' => 'width:100%'
		 	);

		 	echo form_submit($data);
		 	
            

 echo form_close(); 
	 	
	 ?>
</div>