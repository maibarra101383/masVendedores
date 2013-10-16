<div id="login_form" 
	 style="width:400px; margin:100px auto; border-radius:5px; border:1px solid #909090; pading:20px" >

	 <?php
	 	//echo '<p>'.$error_message.'</p>';
	 	//echo validation_errors();
	 	if (isset($error_menssage)){
	 		echo '<p>'.$error_menssage.'</p>';
	 	}


	 	echo form_open();

	 		echo form_label('Usuario : ');
		 	$data = array(
		 		'name'  =>  'nombre',
		 		'id'    => 'nombre',
		 		'value' => set_value('nombre'),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('nombre');

		 	echo form_label('Clave : ');
		 	$data = array(
		 		'name'  =>  'clave',
		 		'id'    => 'clave',
		 		'value' => '',
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('clave');

		 	
            
		 	/*echo form_label('Status: ');

		 	$data = array(
		    	'name'    => 'status',
		    	'id'      => 'status',
		    	'value' => set_value('status'),
		 		'style' => 'width:100%'
		    );

		       echo form_input($data);
		 	   echo form_error('status');



	 		echo form_label('Es_admin: ');
		 	$data = array(
		 		'es_admin'  =>  'es_admin',
		 		'id'    => 'es_admin',
		 		'value' => set_value('es_admin'),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('es_admin');

            
            echo form_label('Zona: ');
		 	$data = array(
		 		'zona'  =>  'zona',
		 		'id'    => 'zona',
		 		'value' => set_value('zona'),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('zona');*/




		 	echo " <br /> <a href=" . base_url('vendedor/alta_vendedor') . ">Registro</a><br />";

		 	$data = array(
		 		'name'  =>  'login',
		 		'id'    => 'login',
		 		'value' => 'Login',
		 		'style' => 'width:40%'
		 	);

		 	echo form_submit($data);

	 	echo form_close(); 
	 ?>
</div>