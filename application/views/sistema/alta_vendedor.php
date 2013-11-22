 <h1>Pagina de Registro</h1> 
<div id="login_form" 
	 style="width:400px; margin:100px auto; border-radius:5px; border:1px solid #909090; pading:20px" >

	 <?php
	 	/*if (isset($error_menssage)){
	 		echo '<p>'.$error_menssage.'</p>';
	 	}*/
	 	echo form_label('DATOS DEL VENDEDOR <br><br> ');
	 	echo form_open();
            
            
            echo form_label('Usuario(email) : ');
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
            
		 	
            
            echo form_label('  DATOS GENERALES <br><br> ');

            echo form_label('Nombre : ');
		 	$data = array(
		 		'name'  => 'nombre',
		 		'id'    => 'usuario',
		 		'value' => set_value('nombre'),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('nombre');


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


              echo form_label('Lada1 : ');
		 	$data = array(
		 		'name'  => 'lada1',
		 		'id'    => 'lada1',
		 		'value' => set_value('lada1'),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('lada1');


              echo form_label('Teléfono 1: ');
		 	$data = array(
		 		'name'  => 'telefono1',
		 		'id'    => 'telefono1',
		 		'value' => set_value('telefono1'),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('telefono1');

              echo form_label('Extención 1 : ');
		 	$data = array(
		 		'name'  => 'ext1',
		 		'id'    => 'ext1',
		 		'value' => set_value('ext1'),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('ext1');

            
		 	  echo form_label('Lada 2 : ');
		 	$data = array(
		 		'name'  => 'lada2',
		 		'id'    => 'lada2',
		 		'value' => set_value('lada2'),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('lada2');



		 	  echo form_label('Teléfono 2 : ');
		 	$data = array(
		 		'name'  => 'telefono2',
		 		'id'    => 'telefono2',
		 		'value' => set_value('telefono2'),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('telefono2');


		 	  echo form_label('Extención 2 : ');
		 	$data = array(
		 		'name'  => 'ext2',
		 		'id'    => 'ext2',
		 		'value' => set_value('ext2'),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('ext2');

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
		 		'name'  => 'zona',
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