  <h1>Mi Lista de Clientes</h1> <a href="<?= base_url('clientes/alta_cliente/'); ?>">Alta Clientes</a>
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
<tfoot>
	<tr>
		<td colspan="100%">
			<div id="paging">
				<ul>
					<li>
						<a href="#">
							<span>Anterior</span>
						</a>
					</li>
					<li>
						<a href="#" class="active">
							<span>1</span>
						</a>
					</li>
					<li>
						<a href="#">
							<span>2</span>
						</a>
					</li>
					<li>
						<a href="#">
							<span>3</span>
						</a>
					</li>
					<li>
						<a href="#">
							<span>4</span>
						</a>
					</li>
					<li>
						<a href="#">
							<span>5</span>
						</a>
					</li>
					<li>
						<a href="#">
							<span>Siguente</span>
						</a>
					</li>
				</ul>
			</div>
		</tr>
	</tfoot>
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
                echo '<td><a href="'.base_url('requerimientos/editar_requerimiento/'.$aItem->id).'">Ver Requerimiento </a></td>';
                echo  '<td><a href="'.base_url('clientes/editar_cliente/'.$aItem->id).'">Editar</a></td>';
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
