<body id="wrapper_cli">
<h1>Requerimiento para propuesta de solución</h1> 
<div id="login_form" 
	 style="width:700px; margin:100px auto; border-radius:5px; border:5px solid #58ACFA; pading:20px" >

	 <?php
	 echo form_open_multipart();
	      
          echo form_label(' <br><br>  DESCRIPCION:  <br><br>');

          $data = array(
		 		'name'  => 'des',
		 		'id'    => 'des',
		 		'style' => 'width:100%',
		 		'value' => set_value('des', $oRequerimiento->descripcion)
		 	);

		 	echo form_textarea($data);
      

          echo form_label(' <br><br>  NOTAS:  <br><br>');

          $data = array(
		 		'name'  => 'nota',
		 		'id'    => 'nota',
		 		'style' => 'width:100%',
		 		'value' => set_value('nota', $oRequerimiento->notas)
		 	);

		 	echo form_textarea($data);

?>

		 	<input type="file" name="userfile" size="20" />
<?php

                $data = array(
		 		'name'  => 'login',
		 		'id'    => 'login',
		 		'value' => 'Registro',
		 		'style' => 'width:100%',
		 		'onClick' => "alert('Tu requerimiento se guardó y se envió por correo al administrador de masQweb');"
		 	);

		 	echo form_submit($data);

 /*echo '<input name="fecha_v" type="hidden" id="fecha_v" />';
 echo '<input name="fecha_c" type="hidden" id="fecha_c" />';*/
 echo form_close(); 
	 	
	 ?>
</div>