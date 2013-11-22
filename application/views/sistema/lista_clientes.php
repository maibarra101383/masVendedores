<h3>Mi Lista de Clientes</h3> 
<a href="<?= base_url('clientes/alta_cliente/'); ?>">Alta Clientes</a>
<a href="<?= base_url('login/logout'); ?>">Cerrar sesión</a>
<?php if($this->session->userdata('admin')==1): ?> 
	<a href="<?= base_url('vendedores/'); ?>">Regresar a Lista Vendedores</a>
<?php endif; ?>
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
                echo '<td>'.$aItem->fecha_c.'</td>';
                echo '<td>'.$aItem->fecha_v.'</td>'; 
                  $aItem->producto->get();
				           echo '<td>';
				foreach($aItem->producto->all as $productos){

							echo $productos->nombre;
							echo '<br />';
						}
                echo '<td><a href="'.base_url('requerimientos/editar_requerimiento/'.$aItem->id).'">
                <img src="'.base_url('assets/imagenes/v.png').'" width=25 heigth=25 title="ver"> </a></td>';
                echo  '<td><a href="'.base_url('clientes/editar_cliente/'.$aItem->id).'">
                          <img src="'.base_url('assets/imagenes/Edit.png').'" width=25 heigth=25 title="Editar"></a></td>';
                echo '</tr>';
		}

				
		/*<tr>
			<td>data</td>
			<td>data</td>
			<td>data</td>
		</tr>*/
	?>

</tbody>
</table></div>
