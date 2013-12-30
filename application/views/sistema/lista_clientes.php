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
      <li><a href="#"><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
       <a href="<?= base_url('clientes/alta_cliente'); ?>">
      <img src="<?=base_url('assets/imagenes/agregarcli.jpg');?>"align="left" WIDTH=20 HEIGHT=20  HSPACE="10"  title="Alta Clientes" />Alta Clientes </a></li></a>
      
      <li><a href="#"><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      	<a href="<?= base_url('login/logout'); ?>">
      <img src="<?=base_url('assets/imagenes/salida.jpg');?>"align="left" WIDTH=20 HEIGHT=20 HSPACE="10"  title="Salida"/>Salida</a></li></a>
		<?php if($this->session->userdata('admin')==1): ?>
      <li><a href="#">
       
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <a href="<?= base_url('vendedores'); ?>">
     <img src="<?=base_url('assets/imagenes/listavn.jpg');?>"align="left" WIDTH=20 HEIGHT=20 HSPACE="10" title="Lista Vendedores" />Regresar a lista vendedores
     </a></li>
      <?php endif; ?> 
    </ul>
  </li>
</a>
</ul>

<h3>Mi Lista de Clientes</h3>
<div class="datagrid">
	   <form method="post" action="<?=base_url()?>clientes/pdf/1/<?= $id_vendedor ?>" />


<table align="center">
         <input  type="submit" value="Crear PDF" title="Crear PDF" />
           </form>
           </div>

<?php
echo form_open();
    
    echo form_label('Nombre:','nombre');
   

    echo form_input(array('name'  => 'nombre', 
                          'id'    => 'nombre', 
                          'size'  => '20', 
                          'value' => set_value('nombre'),
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
		<th>Cliente</th>
		<th>Proyecto en Proceso</th>
        <th>Nombre</th>
         <th>Lada 1</th>
        <th>Telefono 1</th>
        <th>Extencion 1</th>
         <th>Lada 2</th>
         <th>Telefono2</th>
          <th>Extencion 2</th>
          <th>Email</th>
         <th>Fecha Contacto</th>
         <th>Fecha Visita</th>
         <th>Producto</th>
         <th>Requerimientos</th>
             <th>Editar</th>
         
    </tr></thead>
<?php if($aClientes->paged->total_pages > 1): ?>
			<tfoot>
				<tr>
					<td colspan="100%">
						<div id="paging">
							<ul>
								<?php if($aClientes->paged->has_previous): ?>
									<li>
										<a href="<?= base_url('clientes/index/1/'.$id_vendedor); ?>">
											<span>Inicio</span>
										</a>
									</li>
									<li>
										<a href="<?= base_url('clientes/index/'.$aClientes->paged->previous_page.'/'.$id_vendedor); ?>">
											<span>Anterior</span>
										</a>
									</li>
								<?php endif; ?>

								<?php 
									for($x = 1; $x <= $aClientes->paged->total_pages; $x++): 
										if($paginaActual == $x){
											$pagActiva = 'active';
										} else {
											$pagActiva = '';
										}
								?>
											<li>
												<a href="<?= base_url('clientes/index/'.$x.'/'.$id_vendedor); ?>" class="<?= $pagActiva ?>">
													<span><?= $x; ?></span>
												</a>
											</li>
								<?php endfor; ?>

								<?php if($aClientes->paged->has_next): ?>
									<li>
										<a href="<?= base_url('clientes/index/'.$aClientes->paged->next_page.'/'.$id_vendedor); ?>">
											<span>Siguiente</span>
										</a>
									</li>
									<li>
										<a href="<?= base_url('clientes/index/'.$aClientes->paged->total_pages.'/'.$id_vendedor); ?>">
											<span>Fin</span>
										</a>
									</li>
								<?php endif; ?>
							</ul>
						</div>
					</tr>
				</tfoot>
		<?php endif; ?>

<tbody>
	<?php
		foreach($aClientes as $aItem){
			//print_r($aItem);
			$aItem->datos_general->get();
			echo '<tr>';
				echo '<td>'.$aItem->nombre.'</td>';
				echo '<td>'.$aItem->status.'</td>';
				echo '<td>'.$aItem->datos_general->nombre.'</td>';
				echo '<td>'.$aItem->datos_general->lada1.'</td>';
				echo '<td>'.$aItem->datos_general->telefono1.'</td>';
                echo '<td>'.$aItem->datos_general->ext1.'</td>';
                echo '<td>'.$aItem->datos_general->lada2.'</td>';
                echo '<td>'.$aItem->datos_general->telefono2.'</td>';
                echo '<td>'.$aItem->datos_general->ext2.'</td>';
                 echo '<td>'.$aItem->datos_general->email.'</td>';
                echo '<td>'.$aItem->fecha_c.'</td>';
                echo '<td>'.$aItem->fecha_v.'</td>'; 
                  $aItem->producto->get();
				           echo '<td>';

				$cliente_prod = new Cliente_producto();


				foreach($aItem->producto->all as $productos){

					$cliente_prod->where(array('cliente_id' => $aItem->id,
												'producto_id' => $productos->id))->get();

					$requerimiento = $cliente_prod->requerimiento->get();

							echo $productos->nombre;
							if($requerimiento->propuesta != ""){
								echo '<a href="'.base_url('propuestas/'.$requerimiento->propuesta).'">
								<img src="'.base_url('assets/imagenes/archivos.jpg').'" width=30 heigth=30 title="ver propuesta">
								</a>';
							}

							echo '<br/>';

						}

                echo '<td><a href="'.base_url('requerimientos/requerimiento/'.$aItem->id).'">
                <center>
                <img src="'.base_url('assets/imagenes/v.png').'" width=25 heigth=25 title="ver"></center> </a></td>';
                echo  '<td><a href="'.base_url('clientes/editar_cliente/'.$aItem->id).'">
                          <img src="'.base_url('assets/imagenes/Edit.png').'" width=25 heigth=25 title="Editar"></a></td>';
                echo '</tr>';
		}

				
		
	?>
</body>
</tbody>
</table></div>
