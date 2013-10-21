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
		 		'value' => set_value('usuario',$empresa),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('usuario');
            
            echo form_label('DATOS GENERALES DEL CLIENTE  ');

            echo form_label('Nombre : ');
		 	$data = array(
		 		'name'  => 'nombre',
		 		'id'    => 'nombre',
		 		'value' => set_value('nombre',$nombre),
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


		 	echo form_label('Cargo del Cliente : ');
		 	$data = array(
		 		'name'  => 'cargo del cliente',
		 		'id'    => 'cargo del cliente',
		 		'value' => set_value('cargo del cliente',$cargo_cliente),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('cargo del cliente');


		 		 echo form_label('Giro de la Empresa : ');
		 	$data = array(
		 		'name'  => 'giro de la empresa',
		 		'id'    => 'giro de la empresa',
		 		'value' => set_value('giro de la empresa',$giro_empresa),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('giro de la empresa');


             echo form_label('  PRODUCTOS ');

             

            echo form_label('Pagina Web : ');
             $data = array(
                'name'        => 'pagina web',
                'id'          => 'pagina web',
                'value'       => 'accept',
                'checked'     => false,
                'style'       => 'margin:10px',
            );

              echo form_checkbox($data);

             echo form_label('Aplicacion Movil : ');
             $data = array(
                'name'        => 'aplicacion movil',
                'id'          => 'aplicacion movil',
                'value'       => 'accept',
                'checked'     => false,
                'style'       => 'margin:10px',
            );

              echo form_checkbox($data);

              
             echo form_label('Sistema : ');
             $data = array(
                'name'        => 'sistema',
                'id'          => 'sistema',
                'value'       => 'accept',
                'checked'     => false,
                'style'       => 'margin:10px',
            );

              echo form_checkbox($data);

             echo form_label('Publicidad : ');
             $data = array(
                'name'        => 'publicidad',
                'id'          => 'publicidad',
                'value'       => 'accept',
                'checked'     => false,
                'style'       => 'margin:10px',
            );

              echo form_checkbox($data);
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