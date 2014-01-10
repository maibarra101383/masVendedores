
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
 
<?php if($aVendedores->paged->total_pages > 1): ?>
      <tfoot>
        <tr>
          <td colspan="100%">
            <div id="paging">
              <ul>
                <?php if($aVendedores->paged->has_previous): ?>
                  <li>
                    <a href="<?= base_url('vendedores/index/1/'.$id_vendedor); ?>">
                      <span>Inicio</span>
                    </a>
                  </li>
                  <li>
                    <a href="<?= base_url('vendedores/index/'.$aVendedores->paged->previous_page.'/'.$id_vendedor); ?>">
                      <span>Anterior</span>
                    </a>
                  </li>
                <?php endif; ?>

                <?php 
                  for($x = 1; $x <= $aVendedores->paged->total_pages; $x++): 
                    if($paginaActual == $x){
                      $pagActiva = 'active';
                    } else {
                      $pagActiva = '';
                    }
                ?>
                      <li>
                        <a href="<?= base_url('vendedores/index/'.$x.'/'.$id_vendedor); ?>" class="<?= $pagActiva ?>">
                          <span><?= $x; ?></span>
                        </a>
                      </li>
                <?php endfor; ?>

                <?php if($aVendedores->paged->has_next): ?>
                  <li>
                    <a href="<?= base_url('vendedores/index/'.$aVendedores->paged->next_page.'/'.$id_vendedor); ?>">
                      <span>Siguiente</span>
                    </a>
                  </li>
                  <li>
                    <a href="<?= base_url('vendedores/index/'.$aVendedores->paged->total_pages.'/'.$id_vendedor); ?>">
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
