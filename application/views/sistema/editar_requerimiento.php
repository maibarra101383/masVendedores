<h3>Requerimiento para propuesta de solución</h3> 
<a href="<?= base_url('clientes/'); ?>">Regresar a Lista Clientes</a>
<div id="login_form" 
	 style="width:700px; margin:100px auto; border-radius:5px; border:1px solid #909090; pading:20px" >

	 <?php
	 	/*if (isset($error_menssage)){
	 		echo '<p>'.$error_menssage.'</p>';
	 	}*/
	 	echo form_label('DATOS DEL CLIENTE <br><br>');
	 	echo form_open();
            
           
            echo form_label('Nombre de la Empresa : ');
		 	 echo form_label ($aCliente->nombre);
		 	 
            $aCliente->datos_general->get();
            echo form_label(' <br><br> DATOS GENERALES DEL CONTACTO  <br><br>');
             echo form_label('Nombre: ');
             echo form_label ($aCliente->datos_general->nombre);
            


            echo form_label('<br><br>Apellido Paterno : ');
		  echo form_label ($aCliente->datos_general->apellido_p );


		 	echo form_label('<br><br>Apellido Materno : ');
		 echo form_label ($aCliente->datos_general->apellido_m );
           


            echo form_label('<br><br>Email : ');
		 echo form_label ($aCliente->datos_general->email);


             
		 	 echo form_label('<br><br>Dirección : ');
		 	 echo form_label ($aCliente->datos_general->direccion);


		 	echo form_label('<br><br>Cargo del Cliente : ');
		echo form_label ($aCliente->datos_general->cargo_cliente );


		 		 echo form_label('<br><br>Giro de la Empresa : ');
		  echo form_label ($aCliente->datos_general->giro_empresa);

             echo form_label(' <br><br>  PRODUCTOS:  <br><br>');

             $prod_cli = $aCliente->producto->get();

			foreach ($prod_cli as $prod){
				$nota = '';
				$descripcion = '';

				foreach($aRequerimiento as $requerimiento){
					$requerimiento->cliente_producto->get();
					if($requerimiento->cliente_producto->producto_id == $prod->id){
						$nota = $requerimiento->notas;
						$descripcion = $requerimiento->descripcion;
						
					}
				}

          echo  form_label($prod->nombre);

          echo form_label(' <br><br>  DESCRIPCION:  <br><br>');

          $data = array(
		 		'name'  => 'des_'.$prod->id,
		 		'id'    => 'des_'. $prod->id,
		 		'style' => 'width:100%',
		 		'value' => $descripcion
		 	);

		 	echo form_textarea($data);
         // <textarea id="textarea_comunicacion" name="comunicacion" rows="10" cols="50"></textarea>

          echo form_label(' <br><br>  NOTAS:  <br><br>');

          $data = array(
		 		'name'  => 'nota_'.$prod->id,
		 		'id'    => 'nota_'.$prod->id,
		 		'style' => 'width:100%',
		 		'value' => $nota
		 	);

		 	echo form_textarea($data);
			


             }

                $data = array(
		 		'name'  => 'login',
		 		'id'    => 'login',
		 		'value' => 'Registro',
		 		'style' => 'width:100%'
		 	);

		 	echo form_submit($data);




		  	$data = array(
		 		'usuario'  => $aCliente->usuario_id
		 	);
	 echo form_hidden ($data);
//echo  '<td><a href="'.base_url('editar_requerimiento/clientes/'.$aItem->id).'">Regresar</a></td>';


	/*$data = array(
		 		'name'  => 'producto',
		 		'id'    => 'producto',
		 		'value' => $aCliente->producto_id,
		 		'style' => 'width:100%'
		 	);
	 echo form_hidden ($data);*/







		 		
                	
 /*echo '<input name="fecha_v" type="hidden" id="fecha_v" />';
 echo '<input name="fecha_c" type="hidden" id="fecha_c" />';*/
 echo form_close(); 
	 	
	 ?>
</div>

