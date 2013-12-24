<body id="wrapper_cli">
<h3>Requerimiento para propuesta de solución</h3> 
<a href="<?= base_url('clientes/'); ?>">Regresar a Lista Clientes</a>
<div  class="requerimiento"; id="login_form"
	 style="width:90%; heigth=100px;  margin:100px auto; border-radius:5px; border:5px solid #58ACFA; pading:20px valing:center" >

<script>
$(function() {
$( "#tabs" ).tabs();
});
</script>


<?php
echo'<body>';
echo'<div id="tabs">';
echo'<ul>';
echo'<li><a href="#tabs-1" style= background-color:#00BFFF>DATOS DEL CLIENTE</a></li>';
echo'<li><a href="#tabs-2" style= background-color:#819FF7>DATOS DEL PROYECTO O PRODUCTO</a></li>';
echo'</ul>';

echo'<div id="tabs-1" style= background-color:#00BFFF>';
echo'<table>';
        echo'<tr>';
        echo '<td width=20% valing="top">';
	 	echo form_open();
        echo'<tr>';
        echo '<td width=30% valing="top">';
             echo form_label('Nombre de la Empresa : ');
              echo'</td>';

              echo '<td width=20% valing="top">';
		 	 echo form_label ($aCliente->nombre);
		 	 echo'</td>';
		 	 echo'</tr>';

		 	  echo'<tr>';
		 	 echo '<td colspan=100%>';
            $aCliente->datos_general->get();
            echo form_label(' <br><br> DATOS GENERALES DEL CONTACTO  <br><br>');
            echo'</td>';
		 	 echo'</tr>';

            echo'<tr>';
        echo '<td width=10% valing="top">';
             echo form_label('Nombre: ');
             echo'</td>';

		 	 echo '<td width=10% valing="top">';
             echo form_label ($aCliente->datos_general->nombre);
             echo'</td>';
           

           
        echo '<td width=20% valing="top">';
            echo form_label('<br><br>Apellido Paterno : ');
            echo'</td>';
          
          echo '<td width=10%>';
		  echo form_label ($aCliente->datos_general->apellido_p );
          echo'</td>';
           
        echo '<td width=30% valing="top">';
		 	echo form_label('<br><br>Apellido Materno : ');
		 	echo'</td>';
          
          echo '<td width=30%>';
		 echo form_label ($aCliente->datos_general->apellido_m );
         echo'</td>';
            echo'</tr>';  

            echo'<tr>';
        echo '<td width=8% valing="top">';
            echo form_label('<br><br>Email : ');
            echo'</td>';
          
          echo '<td width=8% valing="top">';
		 echo form_label ($aCliente->datos_general->email);
         echo'</td>';
            echo'</tr>';

             echo'<tr>';
        echo '<td width=20% valing="top">';
		 	 echo form_label('<br><br>Dirección : ');
		 	 echo'</td>';

		 	 echo '<td width=20% valing="top">';
		 	 echo form_label ($aCliente->datos_general->direccion);
             echo'</td>';
            echo'</tr>';

            echo'<tr>';
        echo '<td width=20% valing="top">';
		 	echo form_label('<br><br>Cargo del Cliente : ');
		 	echo'</td>';

		 	echo '<td width=20% valing="top">';
		echo form_label ($aCliente->datos_general->cargo_cliente );
          echo'</td>';
            echo'</tr>';
                
                echo'<tr>';
        echo '<td width=20% valing="top">';
		 		 echo form_label('<br><br>Giro de la Empresa : ');
		 		 echo'</td>';

		 	echo '<td width=20% valing="top">';
		  echo form_label ($aCliente->datos_general->giro_empresa);
		  echo'</td>';
            echo'</tr>';
            echo'</table>';		 	
echo'</div>';
              
echo'<div id="tabs-2" style= background-color:#819FF7>';
echo'<table>';

             echo'<tr>';
        echo '<td width=20% valing="top">';
             echo form_label(' <br><br>  PRODUCTOS:  <br><br>');
              echo'</td>';

             echo '<td colspan=100%>';

             $prod_cli  = $aCliente->producto->get();
             $valid_req = new Cliente_producto();


			foreach ($prod_cli as $prod){

				$valid_req->where(array('producto_id' => $prod->id, 
										'cliente_id'  => $aCliente->id))->get();                

          echo  form_label($prod->nombre);

          if($valid_req->requerimiento_id == 0){
          	echo '<a href="'.base_url('requerimientos/alta_requerimiento/'.$prod->id.'/'.$aCliente->id).'" style="text-decoration:none"> 
          	 		<img src="'.base_url('assets/imagenes/agregar.png').'" width="20" height="20"/> 
          	 	  </a>';
          } else {
          	echo '<a href="'.base_url('requerimientos/editar_requerimiento/'.$valid_req->requerimiento_id).'" style="text-decoration:none"> 
          	 		<img src="'.base_url('assets/imagenes/Edit.png').'" width="20" height="20"/> 
          	 	  </a>';

          }
		  


             }
             echo'</td>';
            echo'</tr>';

            echo'<tr>';
        echo '<td width=20% valing="top">';

                $data = array(
		 		'name'  => 'login',
		 		'id'    => 'login',
		 		'value' => 'Guardar',
		 		'style' => 'width:100%'
		 	);

		 	echo form_submit($data);


 echo'</td>';
            echo'</tr>';



		  	$data = array(
		 		'usuario'  => $aCliente->usuario_id
		 	);
	 echo form_hidden ($data);
 echo form_close(); 
	 	
	 ?>
	</table>		 	
</div>
	</table>	
</div>

