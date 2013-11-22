 <script>
	$(function(){ Valid.login() });
</script>
 <h1>BIENVENIDO</h1> 
<div id="login_form" 
	 style="width:400px; margin:100px auto; border-radius:5px; border:1px solid #909090; pading:20px" > 

	 <?php

	 	if (isset($error_menssage)){
	 		echo '<div class="error">'.$error_menssage.'</div>';
	 	}
        $attributes = array('id' => 'loginForm');

	 	echo form_open(null,$attributes);

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

		 	echo form_password($data);
		 	echo form_error('clave');

		 	
       echo " <br /> <a href=" . base_url('vendedores/alta_vendedor') . ">Registro</a><br />";

		 	$data = array(
		 		'name'  =>  'login',
		 		'id'    => 'login',
		 		'value' => 'Login',
		 		'style' => 'width:40%'
		 	);

		 	echo form_submit($data);
		 	$data['cssFiles'] = array('login/css/style.css');

	 	echo form_close(); 
	 ?>
</div>