<body id="wrapper_cli">
 <h1>Pagina de Registro</h1>

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
echo'<li><a href="#tabs-1">DATOS DEL USUARIO</a></li>';
echo'<li><a href="#tabs-2">DATOS GENERALES DEL USUARIO</a></li>';
echo'</ul>';

echo'<div id="tabs-1">';
echo'<table>';
        echo'<tr>';
        echo '<td width=20% valing="top">';
	 	echo form_open();
	 	echo form_label('Usuario(email) : ');
            echo '</td>';
            
		 	echo '<td colspan="100%">';
		 	$data = array(
		 		'name'  => 'usuario',
		 		'id'    => 'usuario',
		 		'value' => set_value('usuario'),
		 		'style' => 'width:50%'
		 	);

		 	echo form_input($data);
		 	echo form_error('usuario');
		 	echo '</td>';
		 	echo'</tr>';

		echo'<tr>';
        echo '<td width=20% valing="top">';
		 echo form_label('Clave : ');
        echo '</td>';


        echo '<td colspan="100%">';
            $data = array(
            'name'  => 'clave',
            'id'    => 'clave',
            'style' => 'width:50%'
             );

         echo form_password($data);
          echo form_error('clave');
          echo '</td>';
		 	echo'</tr>';


      echo'<tr>';
        echo '<td width=20% valing="top">';
      echo form_label('Clave Confirmada: ');
       echo '</td>';

       echo '<td colspan="100%">';
        $data = array(
        'name'  => 'claveconf',
        'id'    => 'claveconf',
        'style' => 'width:50%'
         );

       echo form_password($data);
       echo form_error('claveconf');
       echo '</td>';
	   echo'</tr>';
                   

            
            echo'<tr>';
            echo '<td width=15% valing="top">';
		 	echo form_label('Zona: ');
		 	echo'</td>';

		    echo '<td  colspan="100%">';
		 	$data = array(
		 		'name'  =>  'zona',
		 		'id'    => 'zona',
		 		'value' => set_value('zona'),
		 		'style' => 'width:50%'
		 	);

		 	echo form_input($data);
		 	echo form_error('zona');
		 	echo '</td>';
		 	echo'</tr>';
echo'</table>';		 	
echo'</div>';



echo'<div id="tabs-2">';
echo'<table>';
 echo'<tr>'; 
            echo '<td width=15% valing="top">';
            echo form_label('Nombre : ');
            echo'</td>';

         
            echo'<td colpan="15%">';  
		 	$data = array(
		 		'name'  => 'nombre',
		 		'id'    => 'usuario',
		 		'value' => set_value('nombre'),
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
		 		'value' => set_value('apat'),
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
		 		'value' => set_value('amat'),
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
		 		'value' => set_value('email'),
		 		'style' => 'width:35%'
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
		 		'value' => set_value('lada1'),
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
		 		'value' => set_value('telefono1'),
		 		'style' => 'width:50%'
		 	);

		 	echo form_input($data);
		 	echo form_error('telefono1');
		 	echo '</td>';

              echo '<td width=15% valing="top">';
              echo form_label('Extención 1 : ');
              echo '</td>';

              echo '<td width=15% valing="top">';
              $data = array(
		 		'name'  => 'ext1',
		 		'id'    => 'ext1',
		 		'value' => set_value('ext1'),
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
		 		'value' => set_value('lada2'),
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
		 		'value' => set_value('telefono2'),
		 		'style' => 'width:50%'
		 	);

		 	echo form_input($data);
		 	echo form_error('telefono2');
		 	echo '</td>';

              echo '<td width=15% valing="top">';
		 	  echo form_label('Extención 2 : ');
		 	  echo '</td>';

		 	echo '<td width=15% valing="top">';
		 	$data = array(
		 		'name'  => 'ext2',
		 		'id'    => 'ext2',
		 		'value' => set_value('ext2'),
		 		'style' => 'width:30%'
		 	);

		 	echo form_input($data);
		 	echo form_error('ext2');
		 	echo '</td>';
		 	echo'</tr>';

             
            echo'<tr>';
            echo '<td width=15% valing="top">';
             echo form_label('Dirección : ');
             echo '</td>';

             echo '<td width=15% valing="top">';
		 	$data = array(
		 		'name'  => 'direccion',
		 		'id'    => 'direccion',
		 		'value' => set_value('direccion'),
		 		'style' => 'width:100%'
		 	);

		 	echo form_input($data);
		 	echo form_error('direccion');
		 	echo '</td>';
		 	echo'</tr>';


 
 
 echo' <tr>';
 echo'<center>';
               echo'<td valing="center" colspan="100%">';
                $data = array(
		 		'name'  => 'login',
		 		'id'    => 'login',
		 		'value' => 'Guardar',
		 		'style' => 'width:20%'
		 	);
            echo'</center>';

		 	echo form_submit($data);
		 	
		 	echo form_close(); 
		 	echo'</table>';		 	
echo'</div>';
		 	?>


	 	


</table>
</div>
</div>
</body>
</html>
