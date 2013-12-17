<body id="wrapper_login">
 <h1>BIENVENIDO</h1> 
<div  style="width:470px; height:270px; margin:0 auto; border-radius:5px; border:1px solid #909090; padding:20px align='center'"; class="login" >
	 <?php
	 
	echo'<div class="login">';
	 	echo form_open();
        
            echo'<table width="300" height="200" class="login">';
               echo'<tr>';

        echo '<td width=20% valing="top">';
	 		echo form_label('Usuario : ');
	 		echo'</td>';

	 		echo '<td width=20% valing="top">';
		 	$data = array(
		 		'name'  =>  'nombre',
		 		'id'    => 'nombre',
		 		'value' => set_value('nombre'),
		 		'class' =>'login',
		 		'style' => 'width:140%'
		 	);

		 	echo form_input($data);
		 	echo form_error('nombre');
		 	echo'</tr>';
        echo '</td>';

           echo'<tr>';
        echo '<td width=20% valing="top">';
            echo form_label('Clave : ');
            echo'</td>';

        echo '<td width=20% valing="top">';
		 	$data = array(
		 		'name'  =>  'clave',
		 		'id'    => 'clave',
		 		'value' => set_value('clave'),
		 		'class' =>'login',
		 		'style' => 'width:140%'
		 	);

		 	echo form_password($data);
		 	echo form_error('clave');
		 	echo '</td>';
		 	   echo'</tr>';
               echo'</table>';

		 	
       echo " <br /> <a href=" . base_url('vendedores/alta_vendedor') . ">Registro</a><br />";
       
		 	$data = array(
		 		'name'  =>  'login',
		 		'id'    => 'login',
		 		'value' => 'Login',
		 		'class' => 'login',
		 		'style' => 'width:40%'
		 	);

		 	echo form_submit($data);
		 	

	 	echo form_close(); 
	 ?>
	</div>
</div>