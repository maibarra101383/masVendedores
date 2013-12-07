 <H3> BIENVENIDO ADMINISTRADOR</H3> 

<a href="<?= base_url('login/logout'); ?>">
  <img src="<?=base_url('assets/imagenes/salida.jpg');?>"align="left" WIDTH=35 HEIGHT=35 /> 
</a>
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
<tfoot>
	<tr>
		<td colspan="100%">
			<div id="paging">
				<ul>
					<li>
						<a href="#">
							<span>Previous</span>
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
							<span>Next</span>
						</a>
					</li>
				</ul>
			</div>
		</tr>
	</tfoot>
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
</div>
