
<body id="wrapper_cli">
<script>
  $(function() {
    $( "#menu" ).menu();
  });
  </script>
  <style>
  .ui-menu { width: 150px; height:30px;  }
  </style>
<body>
 
<ul id="menu" class="menu">
	 <li>
    <a href="#">
    	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    	<img src="<?=base_url('assets/imagenes/h.jpg');?>"align="left" WIDTH=25 HEIGHT=25 HSPACE="10"  title="Herramientas"/>Herramientas</a>

    <ul>
<li><a href="#"><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      	<a href="<?= base_url('login/logout'); ?>">
      <img src="<?=base_url('assets/imagenes/salida.jpg');?>"align="left" WIDTH=20 HEIGHT=20 HSPACE="10"  title="Salida"/>Salida  
      </a></li></ul>
		<?php if($this->session->userdata('admin')==1): ?>
		<?php endif; ?> 
    

</a>
  </li>
</ul>
</body>

 <H3 color="white"> BIENVENIDO ADMINISTRADOR</H3> 
  <br> 
  <br>

<?php
echo form_open();
    
    echo form_label('Usuario:','usuario');
   

    echo form_input(array('name'  => 'usuario', 
                          'id'    => 'usuario', 
                          'size'  => '20', 
                          'value' => set_value('usuario'),
                          'class' => 'color_form'));
  
        ($data     = array('name'  => 'buscar', 
                           'id'    => 'buscar',
                           'class' => 'abutton',
                           'value' => 'Buscar',
                           'style' => 'margin:0px'));

            echo form_submit($data);        
                         echo '<a href="'.base_url($return).'" class="abutton_cancel">Cancelar</a>';
                        echo form_close(); 




?>



<div class="datagrid"><table>
<thead>
	<tr>
		<th>Nombre del Vendedor</th>
		<th>Apellido Paterno</th>
		<th>Apellido Materno</th>
		<th>Activo</th>
		<th>Zona</th>
		 <th>Lada 1</th>
        <th>Telefono 1</th>
        <th>Extencion 1</th>
         <th>Lada 2</th>
         <th>Telefono 2</th>
          <th>Extencion 2</th>
          <th>Email</th>
		<th>Editar</th>
		<th>Lista de clientes</th>
	</tr></thead>

 <tbody>
	<?php

		foreach($aVendedores as $aItem){
			//print_r($aItem);
			$aItem->datos_general->get();
			echo '<tr>';
				
                echo '<td>'.$aItem->datos_general->nombre.'</td>';
                echo '<td>'.$aItem->datos_general->apellido_p.'</td>';
                echo '<td>'.$aItem->datos_general->apellido_m.'</td>';
                    echo '<td>'.$aItem->status.'</td>';
				echo '<td>'.$aItem->datos_general->zona.'</td>';
				echo '<td>'.$aItem->datos_general->lada1.'</td>';
				echo '<td>'.$aItem->datos_general->telefono1.'</td>';
				echo '<td>'.$aItem->datos_general->ext1.'</td>';
				echo '<td>'.$aItem->datos_general->lada2.'</td>';
				echo '<td>'.$aItem->datos_general->telefono2.'</td>';
				echo '<td>'.$aItem->datos_general->ext2.'</td>';
				echo '<td>'.$aItem->datos_general->email.'</td>';
				echo '<td><a href="'.base_url('vendedores/editar_vendedor/'.$aItem->id).'">
				<img src="'.base_url('assets/imagenes/Edit.png').'" width=25 heigth=25 title="Editar"></a></td>';
				echo '<td> <center> <a href="'.base_url('clientes/index/1/'.$aItem->id).'">
				<img src="'.base_url('assets/imagenes/list.jpg').'" width=30 heigth=30 title="Lista"></center></a></td>';
			echo '</tr>';
		}
	?>

</tbody>
</table>
</body>
</div>
</div>
