<div id="login_form" 
	 style="width:400px; margin:100px auto; border-radius:5px; border:1px solid #909090; pading:20px" >

	 <?php
	 	/*if (isset($error_menssage)){
	 		echo '<p>'.$error_menssage.'</p>';
	 	}*/
	 	echo form_label('DATOS DEL VENDEDOR ');
	 	echo form_open();
            
            
            echo form_label('Usuario : ');
		 	$data = array(
		 		'name'  => 'usuario',
		 		'id'    => 'usuario',
		 		'value' => set_value('usuario'),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('usuario');

		 	echo form_label('Clave : ');
		 	$data = array(
		 		'name'  => 'clave',
		 		'id'    => 'clave',
		 		'style' => 'width:100%'
		 	);

		 	echo form_password($data);
		 	echo form_error('clave');

		 	echo form_label('Clave Confirmada: ');
		 	$data = array(
		 		'name'  => 'claveconf',
		 		'id'    => 'claveconf',
		 		'style' => 'width:100%'
		 	);

		 	echo form_password($data);
		 	echo form_error('claveconf');
            
		 	
            
            echo form_label('  DATOS GENERALES  ');

            echo form_label('Nombre : ');
		 	$data = array(
		 		'name'  => 'nombre',
		 		'id'    => 'usuario',
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


		 	 echo form_label('Direccion : ');
		 	$data = array(
		 		'name'  => 'direccion',
		 		'id'    => 'direccion',
		 		'value' => set_value('direccion'),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('direccion');

            
            echo form_label('Zona: ');
		 	$data = array(
		 		'name'  =>  'zona',
		 		'id'    => 'zona',
		 		'value' => set_value('zona'),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('zona');


		 	$data = array(
		 		'nombre'  => 'login',
		 		'id'    => 'login',
		 		'value' => 'Registro',
		 		'style' => 'width:100%'
		 	);

		 	echo form_submit($data);


 echo form_close(); 
	 	
	 ?>
</div>