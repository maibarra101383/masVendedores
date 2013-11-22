 <h1>Pagina de Registro</h1> 
<div id="login_form" 
	 style="width:400px; margin:100px auto; border-radius:5px; border:5px solid #58ACFA; pading:20px" >

	 <?php
	 	/*if (isset($error_menssage)){
	 		echo '<p>'.$error_menssage.'</p>';
	 	}*/
	 	echo form_label('DATOS DEL CLIENTE <br><br>');
	 	echo form_open();
            
            
            echo form_label('Nombre de la Empresa : ');
		 	$data = array(
		 		'name'  => 'cliente',
		 		'id'    => 'cliente',
		 		'value' => set_value('cliente'),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('cliente');
            
            echo form_label('  DATOS GENERALES DEL CONTACTO  <br><br>');

            echo form_label('Nombre : ');
		 	$data = array(
		 		'name'  => 'nombre',
		 		'id'    => 'nombre',
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


		 	 echo form_label('Dirección : ');
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
		 		'name'  => 'cargo_cliente',
		 		'id'    => 'cargo_cliente',
		 		'value' => set_value('cargo_cliente'),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('cargo_cliente');


		 		 echo form_label('Giro de la Empresa : ');
		 	$data = array(
		 		'name'  => 'giro_empresa',
		 		'id'    => 'giro_empresa',
		 		'value' => set_value('giro_empresa'),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('giro_empresa');



            echo form_label('Fecha de Contacto : ');
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

		 	echo form_checkbox($data);


             echo form_label(' <br><br>  PRODUCTOS:  <br><br>');

             foreach($aProductos as $aItem){

            	echo form_label($aItem->nombre);

            	$data = array(
                	'name'        => 'productos[]',
                	'value'       => $aItem->id, 
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