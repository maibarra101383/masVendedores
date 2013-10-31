<div id="login_form" 
	 style="width:400px; margin:100px auto; border-radius:5px; border:1px solid #909090; pading:20px" >

	 <?php
	 	/*if (isset($error_menssage)){
	 		echo '<p>'.$error_menssage.'</p>';
	 	}*/
	 	echo form_label('DATOS DEL CLIENTE  <br><br>');
	 	echo form_open();
            
            
            echo form_label('Nombre de la Empresa: ');
		 	$data = array(
		 		'name'  => 'cliente',
		 		'id'    => 'cliente',
		 		'value' => set_value('cliente',$aCliente->nombre),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('cliente');
            
			$aCliente->datos_general->get();

            echo form_label('DATOS GENERALES DEL CLIENTE <br><br> ');

            echo form_label('Nombre : ');
		 	$data = array(
		 		'name'  => 'nombre',
		 		'id'    => 'nombre',
		 		'value' => set_value('nombre',$aCliente->datos_general->nombre),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('nombre');


            echo form_label('Apellido Paterno : ');
		 	$data = array(
		 		'name'  => 'apat',
		 		'id'    => 'apat',
		 		'value' => set_value('apat',$aCliente->datos_general->apellido_p),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('apat');


		 	echo form_label('Apellido Materno : ');
		 	$data = array(
		 		'name'  => 'amat',
		 		'id'    => 'amat',
		 		'value' => set_value('amat',$aCliente->datos_general->apellido_m),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('amat');
           


            echo form_label('Email : ');
		 	$data = array(
		 		'name'  => 'email',
		 		'id'    => 'email',
		 		'value' => set_value('email',$aCliente->datos_general->email),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('email');


             echo form_label('Lada1 : ');
		 	$data = array(
		 		'name'  => 'lada1',
		 		'id'    => 'lada1',
		 		'value' => set_value('lada1',$aCliente->datos_general->lada1),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('lada1');


              echo form_label('Teléfono 1: ');
		 	$data = array(
		 		'name'  => 'telefono1',
		 		'id'    => 'telefono1',
		 		'value' => set_value('telefono1',$aCliente->datos_general->telefono1),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('telefono1');

              

		 	 echo form_label('Direccion : ');
		 	$data = array(
		 		'name'  => 'direccion',
		 		'id'    => 'direccion',
		 		'value' => set_value('direccion',$aCliente->datos_general->direccion),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('direccion');


		 	echo form_label('Cargo del Cliente : ');
		 	$data = array(
		 		'name'  => 'cargo_cliente',
		 		'id'    => 'cargo_cliente',
		 		'value' => set_value('cargo_cliente',$aCliente->cargo_cliente),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('cargo_cliente');


		 		 echo form_label('Giro de la Empresa : ');
		 	$data = array(
		 		'name'  => 'giro_empresa',
		 		'id'    => 'giro_empresa',
		 		'value' => set_value('giro_empresa',$aCliente->giro_empresa),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('giro_empresa');



           echo form_label('Fecha de Contacto : ');
		 	$data = array(
		 		'name'  => 'fecha_c_show',
		 		'id'    => 'fecha_c_show',
		 		'value' => set_value('fecha_c_show',$aCliente->fecha_c),
		 		'style' => 'width:18%'
		 	);

		 	echo form_input($data);
		 	echo form_error('fecha_c_show');


		 	 echo form_label('<br><br>Fecha de Visita : ');
		 	$data = array(
		 		'name'  => 'fecha_v_show',
		 		'id'    => 'fecha_v_show',
		 		'value' => set_value('fecha_v_show',$aCliente->fecha_v),
		 		'style' => 'width:30%'
		 	);

		 	echo form_input($data);
		 	echo form_error('fecha_v_show');
		 	echo form_error('fecha_v');


           
             echo form_label('  PRODUCTOS ');

			$aCliente->producto->get();

			foreach($aCliente->producto->all as $cliente_producto){
             			$aChecked[$cliente_producto->id] = $cliente_producto->id;
             }

             if(!isset($aChecked))
             	$aChecked[0] = 0;

             foreach($aProductos as $producto){

             	echo form_label($producto->nombre);

             	$data = array(
              	'name'        => 'productos[]',
                'value'       => $producto->id,
                'checked'     => (in_array($producto->id,$aChecked))?true:false,
                'style'       => 'margin:10px',
            	);

              echo form_checkbox($data);
             }
              
              echo form_hidden('id_vendedor', $aCliente->usuario_id);
              echo form_hidden('id_datos_generales', $aCliente->datos_general->id_datos_generales);

                $data = array(
		 		'name'  => 'login',
		 		'id'    => 'login',
		 		'value' => 'Registro',
		 		'style' => 'width:100%'
		 	);

		 	echo form_submit($data);

 echo '<input name="fecha_v" type="hidden" id="fecha_v" />';
 echo '<input name="fecha_c" type="hidden" id="fecha_c" />';
 echo form_close(); 
	 	
	 ?>
</div>


<script>
$('#fecha_v_show').datetimepicker({
	controlType: 'select',
	altField: "#fecha_v",
	altFieldTimeOnly: false,
	altFormat: "yy-mm-dd",
	altTimeFormat: "HH:mm"
});

$('#fecha_c_show').datepicker({
	altField: "#fecha_c",
	altFormat: "yy-mm-dd"

});

</script>