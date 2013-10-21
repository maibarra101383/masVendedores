<div id="login_form" 
	 style="width:400px; margin:100px auto; border-radius:5px; border:1px solid #909090; pading:20px" >

	 <?php
	 	/*if (isset($error_menssage)){
	 		echo '<p>'.$error_menssage.'</p>';
	 	}*/
	 	echo form_label('DATOS DEL PRODUCTO ');
	 	echo form_open();
            
            
            echo form_label('Nombre : ');
		 	$data = array(
		 		'name'  => 'nombre',
		 		'id'    => 'nombre',
		 		'value' => set_value('nombre',$nombre),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('nombre');
            
           

            
		 	echo form_label('Status: ');

		 	$data = array(
		    	'name'    => 'status',
		    	'id'      => 'status',
		    	'value' => set_value('status',$status),
		 		'style' => 'width:100%'
		    );

		       echo form_input($data);
		 	   echo form_error('status');




		 	   $data = array(
		 		'nombre'  => 'login',
		 		'id'    => 'login',
		 		'value' => set_value('Registro',$Registro),
		 		'style' => 'width:100%'
		 	);

		 	   echo form_submit($data);

   echo form_close(); 
	 	
	 ?>
</div>