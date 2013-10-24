<div id="login_form" 
	 style="width:400px; margin:100px auto; border-radius:5px; border:1px solid #909090; pading:20px" >

	 <?php
	 	/*if (isset($error_menssage)){
	 		echo '<p>'.$error_menssage.'</p>';
	 	}*/
	 	echo form_label('DATOS DEL USUARIO ');
	 	echo form_open();
            
            
            echo form_label('Usuario : ');
		 	$data = array(
		 		'name'  => 'usuario',
		 		'id'    => 'usuario',
		 		'value' => set_value('usuario',$aVendedor->usuario),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('usuario');

            $aVendedor->datos_general->();
            
            echo form_label('  DATOS GENERALES  ');

            echo form_label('Nombre : ');
		 	$data = array(
		 		'name'  => 'nombre',
		 		'id'    => 'usuario',
		 		'value' => set_value('nombre',$aVendedor->datos_general->nombre),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('nombre');


            echo form_label('Apellido Paterno : ');
		 	$data = array(
		 		'name'  => 'apat',
		 		'id'    => 'apat',
		 		'value' => set_value('apat',$apellido_p),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('apat');


		 	echo form_label('Apellido Materno : ');
		 	$data = array(
		 		'name'  => 'amat',
		 		'id'    => 'amat',
		 		'value' => set_value('amat',$apellido_m),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('amat');
           


            echo form_label('Email : ');
		 	$data = array(
		 		'name'  => 'email',
		 		'id'    => 'email',
		 		'value' => set_value('email',$email),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('email');


              echo form_label('Telefono : ');
		 	$data = array(
		 		'name'  => 'telefono',
		 		'id'    => 'telefono',
		 		'value' => set_value('telefono',$telefono),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('telefono');


		 	echo form_label('Telefono2 : ');
		 	$data = array(
		 		'name'  => 'telefono2',
		 		'id'    => 'telefono2',
		 		'value' => set_value('telefono2',$telefono2),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('telefono2');


		 	 echo form_label('Direccion : ');
		 	$data = array(
		 		'name'  => 'direccion',
		 		'id'    => 'direccion',
		 		'value' => set_value('direccion',$direccion),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('direccion');


		 	echo form_label('Status: ');

		 	$data = array(
		    	'name'    => 'status',
		    	'id'      => 'status',
		    	'value' => set_value('status',$status),
		 		'style' => 'width:100%'
		    );

		       echo form_input($data);
		 	   echo form_error('status');
            
            echo form_label('Zona: ');
		 	$data = array(
		 		'name'  =>  'zona',
		 		'id'    => 'zona',
		 		'value' => set_value('zona',$zona),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('zona');

		 	echo form_hidden('id_datos_generales', $id_datos_generales);
		 	
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