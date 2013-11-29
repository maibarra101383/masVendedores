<script>
$(function() {
$( "#tabs" ).tabs();
});
</script>


<?php
echo'<br>';
echo'<br>';
echo'<br>';
echo'<body>';
echo'<div id="tabs">';
echo'<ul>';
echo'<li><a href="#tabs-1">DATOS DEL CLIENTE</a></li>';
echo'<li><a href="#tabs-2">DATOS GENERALES DEL CONTACTO</a></li>';
echo'<li><a href="#tabs-3">DATOS DEL PROYECTO O PRODUCTO</a></li>';
echo'</ul>';

echo'<div id="tabs-1" "style= background-color:#c2ECCFA">';
echo'<table>';

        echo'<tr>';
        echo '<td width=20% valing="top">';
            echo form_open();
            echo form_label('Nombre de la Empresa: ');
            echo '</td>';

            echo '<td colspan="100%">';
		 	$data = array(
		 		'name'  => 'cliente',
		 		'id'    => 'cliente',
		 		'value' => set_value('cliente',$aCliente->nombre),
		 		'style' => 'width:25%'
		 	);

		 	echo form_input($data);
		 	echo form_error('cliente');
		 	echo '</td>';
		 	echo'</tr>';
		    
		   
		    echo'<tr BGCOLOR=>';
            echo '<td width=15% valing="top">';
            echo form_label('Cargo del Cliente : ');
            echo'</td>';

		 	echo '<td  colspan="100%">';
		 	$data = array(
		 		'name'  => 'cargo_cliente',
		 		'id'    => 'cargo_cliente',
		 		'value' => set_value('cargo_cliente',$aCliente->cargo_cliente),
		 		'style' => 'width:25%'
		 	);

		 	echo form_input($data);
		 	echo form_error('cargo_cliente');
		 	echo '</td>';
		 	echo'</tr>';
                   

            
            echo'<tr>';
            echo '<td width=15% valing="top">';
            echo form_label('Giro de la Empresa : ');
            echo'</td>';

		    echo '<td  colspan="100%">';
		 	$data = array(
		 		'name'  => 'giro_empresa',
		 		'id'    => 'giro_empresa',
		 		'value' => set_value('giro_empresa',$aCliente->giro_empresa),
		 		'style' => 'width:25%'
		 	);

		 	echo form_input($data);
		 	echo form_error('giro_empresa');
		 	echo '</td>';
		 	echo'</tr>';
echo'</table>';		 	
echo'</div>';



echo'<div id="tabs-2">';
echo'<table>';
 echo'<tr>'; 
            echo '<td width=15% valing="top">';
            $aCliente->datos_general->get();
            echo form_label('Nombre : ');

            echo'</td>';

         
            echo'<td colpan="15%">';
		 	$data = array(
		 		'name'  => 'nombre',
		 		'id'    => 'nombre',
		 		'value' => set_value('nombre',$aCliente->datos_general->nombre),
		 		'style' => 'width:50%'
		 	);

		 	echo form_input($data);
		 	echo form_error('nombre');
            echo'</td>';

           
           echo'<td width=15% valing="top">';
           echo form_label('Apellido Paterno : ');
           echo'</td>';

            echo'<td colpan="15%">';  
		 	$data = array(
		 		'name'  => 'apat',
		 		'id'    => 'apat',
		 		'value' => set_value('apat',$aCliente->datos_general->apellido_p),
		 		'style' => 'width:50%'
		 	);

		 	echo form_input($data);
		 	echo form_error('apat');
		 	echo'</td>';
		 	

		 	echo '<td width="15%">';
		 	echo form_label('Apellido Materno : ');

            echo'</td>';

		 	echo'<td colspan="15%">';
		 	$data = array(
		 		'name'  => 'amat',
		 		'id'    => 'amat',
		 		'value' => set_value('amat',$aCliente->datos_general->apellido_m),
		 		'style' => 'width:50%'
		 	);

		 	echo form_input($data);
		 	echo form_error('amat');
            echo '</td>';
		 	echo '</tr>';
            

            echo '<tr>';
            echo '<td width=15%>';
            echo form_label('Email : ');
            echo'</td>';

            echo'<td colspan ="20%">';
		 	$data = array(
		 		'name'  => 'email',
		 		'id'    => 'email',
		 		'value' => set_value('email',$aCliente->datos_general->email),
		 		'style' => 'width:20%'
		 	);

		 	echo form_input($data);
		 	echo form_error('email');
            echo '</td>';
		 	echo '</tr>';
		 	
           
              echo '<tr>';
              echo '<td width=15% valing="top">';
              echo form_label('Lada1 : ');
              echo'</td>';

            echo'<td width=15% valing="top">';
		 	$data = array(
		 		'name'  => 'lada1',
		 		'id'    => 'lada1',
		 		'value' => set_value('lada1',$aCliente->datos_general->lada1),
		 		'style' => 'width:30%'
		 	);

		 	echo form_input($data);
		 	echo form_error('lada1');
		 	echo '</td>';

             echo '<td width=15% valing="top">';
            echo form_label('Teléfono 1: ');
            echo '</td>';

            echo '<td width=15% valing="top">';
		 	$data = array(
		 		'name'  => 'telefono1',
		 		'id'    => 'telefono1',
		 		'value' => set_value('telefono1',$aCliente->datos_general->telefono1),
		 		'style' => 'width:50%'
		 	);

		 	echo form_input($data);
		 	echo form_error('telefono1');
		 	echo '</td>';

              echo '<td width=15% valing="top">';
              echo form_label('Extención 1 : ');
		 	$data = array(
		 		'name'  => 'ext1',
		 		'id'    => 'ext1',
		 		'value' => set_value('ext1',$aCliente->datos_general->ext1),
		 		'style' => 'width:30%'
		 	);

		 	echo form_input($data);
		 	echo form_error('ext1');
		 	echo '</td>';
		 	echo '</tr>';
           
          

           echo '<tr>';
           echo '<td width=15% valing="top">';
           echo form_label('Lada 2 : ');
           echo '</td>';
		 	
		 	echo '<td width=15% valing="top">';
		 	$data = array(
		 		'name'  => 'lada2',
		 		'id'    => 'lada2',
		 		'value' => set_value('lada2',$aCliente->datos_general->lada2),
		 		'style' => 'width:30%'
		 	);

		 	echo form_input($data);
		 	echo form_error('lada2');
             echo '</td>';

		 	echo '<td width=15% valing="top">';
            echo form_label('Teléfono 2 : ');
            echo '</td>';

		 	echo '<td width=15% valing="top">';
		 	$data = array(
		 		'name'  => 'telefono2',
		 		'id'    => 'telefono2',
		 		'value' => set_value('telefono2',$aCliente->datos_general->telefono2),
		 		'style' => 'width:50%'
		 	);

		 	echo form_input($data);
		 	echo form_error('telefono2');
            echo '</td>';

            echo '<td width=15% valing="top">';
            echo form_label('Extención 2 : ');
            
		 	$data = array(
		 		'name'  => 'ext2',
		 		'id'    => 'ext2',
		 		'value' => set_value('ext2',$aCliente->datos_general->ext2),
		 		'style' => 'width:30%'
		 	);

		 	echo form_input($data);
		 	echo form_error('ext2');
		 	echo '</td>';
		 	echo'</tr>';

             
            echo'<tr>';
            echo '<td width=15% valing="top">';
            echo form_label('Direccion : ');
            echo '</td>';

             echo '<td width=15% valing="top">';
		 	$data = array(
		 		'name'  => 'direccion',
		 		'id'    => 'direccion',
		 		'value' => set_value('direccion',$aCliente->datos_general->direccion),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('direccion');
            echo '</td>';
		 	echo'</tr>';

echo'</table>';		 	
echo'</div>';


echo'<div id="tabs-3">';
echo'<table>';

            echo'<tr>';
            echo '<td width=15% valing="top">';
            echo form_label('Fecha de Contacto : ');
            echo '</td>';

            echo '<td colpan="15%">';
		 	$data = array(
		 		'name'  => 'fecha_c_show',
		 		'id'    => 'fecha_c_show',
		 		'value' => set_value('fecha_c_show',$aCliente->fecha_c),
		 		'style' => 'width:10%'
		 	);

		 	echo form_input($data);
		 	echo form_error('fecha_c');
            echo '</td>';
		 	echo'</tr>';

            echo'<tr>';
            echo '<td width=15% valing="top">';
            echo form_label('<br><br>Fecha de Visita : ');
            echo '</td>';

		 	 echo '<td colpan="15%">';
		 	$data = array(
		 		'name'  => 'fecha_v_show',
		 		'id'    => 'fecha_v_show',
		 		'value' => set_value('fecha_v_show',$aCliente->fecha_v),
		 		'style' => 'width:15%'
		 	);

		 	echo form_input($data);
		 	echo form_error('fecha_v');
            echo '</td>';
		 	echo'</tr>';


		 	echo'<tr>';
            echo '<td width=15%>';
            echo form_label('<br><br>Proyecto en Proceso : ');
            echo '</td>';
            echo'<br>';
            echo'<br>';
            echo '<td colpan="15%">';
		 	$data = array(
		 		'name'  => 'status',
		 		'id'    => 'status',
		 		'value' => 1,
		 		'checked' => ($aCliente->status)?"checked":"",
		 		'style' => 'width:5%'
		 	);
             echo form_checkbox($data);
             echo '</td>';
		 	echo'</tr>';
            
            echo'<tr>';
            echo '<td width=15% valing="top">';
             echo'<br>';
             echo form_label('  PRODUCTOS ');
             echo'</tr>';
			$aCliente->producto->get();

			foreach($aCliente->producto->all as $cliente_producto){
             			$aChecked[$cliente_producto->id] = $cliente_producto->id;
             }

             if(!isset($aChecked))
             	$aChecked[0] = 0;

             foreach($aProductos as $producto){
                echo'<tr>';
                echo '<td width=15% valing="top">';
             	echo form_label($producto->nombre);
             	echo'</td>';
                echo'</tr>';

            	echo'<tr>';
                echo '<td width=15% valing="top">';
             	$data = array(
              	'name'        => 'productos[]',
                'value'       => $producto->id,
                'checked'     => (in_array($producto->id,$aChecked))?true:false,
                'style'       => 'margin:10px',
            	);

              echo form_checkbox($data);
              echo '</td>';
              echo'</tr>';
             }
              
             

               

 echo '<input name="fecha_v" type="hidden" id="fecha_v_show" value="'.$aCliente->fecha_v.'"/>';
 echo '<input name="fecha_c" type="hidden" id="fecha_c_show" value="'.$aCliente->fecha_c.'"/>';

	 	
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
</table>
</div>
</div>
</body>
</html>
<?php

 echo form_hidden('id_vendedor', $aCliente->usuario_id);
 echo form_hidden('id_datos_generales', $aCliente->datos_general->id_datos_generales);

 echo' <tr>';
 echo '<center>'; 
  echo'<td valing="center" colspan="100%">';
                $data = array(
		 		'name'  => 'login',
		 		'id'    => 'login',
		 		'value' => 'Actualizar',
		 		'style' => 'width:20%'
		 	);

		 	echo form_submit($data);
		 	echo form_close(); 
		 	echo'</center>';
		 	
		 	?>