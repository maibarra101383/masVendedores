<body id="wrapper_cli">

<script>
  $(function() {
    $( "#menu" ).menu();
  });
  </script>
  <style>
  .ui-menu { width: 150px; height:30px; }
  </style>
</head>
<body>
 
<ul id="menu" class="menu">
   <li>
    <a href="#">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <img src="<?=base_url('assets/imagenes/h.jpg');?>"align="left" WIDTH=25 HEIGHT=25 HSPACE="10"  title="Herramientas"/>Herramientas</a>

    <ul>
      <li>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<a href="<?= base_url('requerimientos/requerimiento/'.$id_cliente); ?>"</a>
     <img src="<?=base_url('assets/imagenes/v.png');?>"align="left" WIDTH=20 HEIGHT=20 HSPACE="10" />Regresar a Requerimientos
     </a></li>
    </ul>
     </ul>

<h1>Requerimiento para propuesta de solución</h1> 
<div id="login_form" 
	 style="width:700px; margin:100px auto; border-radius:5px; border:5px solid #58ACFA; pading:20px" >

	 <?php
	 	echo form_open();
            
          	
          echo form_label(' <br><br>  DESCRIPCION:  <br><br>');

          $data = array(
		 		'name'  => 'des',
		 		'id'    => 'des',
		 		'style' => 'width:100%'
		 	);

		 	echo form_textarea($data);
         // <textarea id="textarea_comunicacion" name="comunicacion" rows="10" cols="50"></textarea>

          echo form_label(' <br><br>  NOTAS:  <br><br>');

          $data = array(
		 		'name'  => 'nota',
		 		'id'    => 'nota',
		 		'style' => 'width:100%'
		 	);

		 	echo form_textarea($data);

                $data = array(
		 		'name'  => 'login',
		 		'id'    => 'login',
		 		'class' => 'abutton',
		 		'value' => 'Registro',
		 		'style' => 'width:98%',
		 		'onClick' => "alert('Tu requerimiento se guardó y se envió por correo al administrador de masQweb');"
		 	);

		 	echo form_submit($data);

 /*echo '<input name="fecha_v" type="hidden" id="fecha_v" />';
 echo '<input name="fecha_c" type="hidden" id="fecha_c" />';*/
 echo form_close(); 
	 	
	 ?>
</div>

