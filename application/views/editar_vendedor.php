<div id="login_form" 
	 style="width:400px; margin:100px auto; border-radius:5px; border:1px solid #909090; pading:20px" >

	 <?php
	 	/*if (isset($error_menssage)){
	 		echo '<p>'.$error_menssage.'</p>';
	 	}*/
	 	echo form_label('DATOS DEL USUARIO <br><br> ');
	 	echo form_open();
            
            
            echo form_label('Usuario(email) : ');
		 	$data = array(
		 		'name'  => 'usuario',
		 		'id'    => 'usuario',
		 		'value' => set_value('usuario',$aVendedor->usuario),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('usuario');

            $aVendedor->datos_general->get();
            
            echo form_label('  DATOS GENERALES <br><br> ');

            echo form_label('Nombre : ');
		 	$data = array(
		 		'name'  => 'nombre',
		 		'id'    => 'usuario',
		 		'value' => set_value('nombre', $aVendedor->datos_general->nombre),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('nombre');


            echo form_label('Apellido Paterno : ');
		 	$data = array(
		 		'name'  => 'apat',
		 		'id'    => 'apat',
		 		'value' => set_value('apat',$aVendedor->datos_general->apellido_p),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('apat');


		 	echo form_label('Apellido Materno : ');
		 	$data = array(
		 		'name'  => 'amat',
		 		'id'    => 'amat',
		 		'value' => set_value('amat',$aVendedor->datos_general->apellido_m),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('amat');
           


            echo form_label('Email : ');
		 	$data = array(
		 		'name'  => 'email',
		 		'id'    => 'email',
		 		'value' => set_value('email',$aVendedor->datos_general->email),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('email');


             echo form_label('Lada1 : ');
		 	$data = array(
		 		'name'  => 'lada1',
		 		'id'    => 'lada1',
		 		'value' => set_value('lada1',$aVendedor->datos_general->lada1),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('lada1');


              echo form_label('Teléfono 1: ');
		 	$data = array(
		 		'name'  => 'telefono1',
		 		'id'    => 'telefono1',
		 		'value' => set_value('telefono1',$aVendedor->datos_general->telefono1),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('telefono1');

              echo form_label('Extención 1 : ');
		 	$data = array(
		 		'name'  => 'ext1',
		 		'id'    => 'ext1',
		 		'value' => set_value('ext1',$aVendedor->datos_general->ext1),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('ext1');

            
		 	  echo form_label('Lada 2 : ');
		 	$data = array(
		 		'name'  => 'lada2',
		 		'id'    => 'lada2',
		 		'value' => set_value('lada2',$aVendedor->datos_general->lada2),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('lada2');



		 	  echo form_label('Teléfono 2 : ');
		 	$data = array(
		 		'name'  => 'telefono2',
		 		'id'    => 'telefono2',
		 		'value' => set_value('telefono2',$aVendedor->datos_general->telefono2),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('telefono2');


		 	  echo form_label('Extención 2 : ');
		 	$data = array(
		 		'name'  => 'ext2',
		 		'id'    => 'ext2',
		 		'value' => set_value('ext2',$aVendedor->datos_general->ext2),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('ext2');


		 	 echo form_label('Direccion : ');
		 	$data = array(
		 		'name'  => 'direccion',
		 		'id'    => 'direccion',
		 		'value' => set_value('direccion',$aVendedor->datos_general->direccion),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('direccion');


		 	echo form_label('Status :  ');
		 	$data = array(
		 		'name'  => 'status',
		 		'id'    => 'status',
		 		'value' => 1,
		 		'checked' => ($aVendedor->status)?"checked":"",
		 		'style' => 'width:100%'
		 	);

		 	echo form_checkbox($data);
            
            echo form_label('Zona: ');
		 	$data = array(
		 		'name'  =>  'zona',
		 		'id'    => 'zona',
		 		'value' => set_value('zona',$aVendedor->datos_general->zona),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('zona');
		 	
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