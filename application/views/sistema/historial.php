<body id="wrapper_cli">
<script>
  $(function() {
    $( "#menu" ).menu();
  });
  </script>
  <style>
  .ui-menu { width: 150px;}
  </style>
<body>

<ul id="menu" class="menu">
     <li>
      <a href="#">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <img src="<?=base_url('assets/imagenes/h.jpg');?>"align="left" WIDTH=23 HEIGHT=23 HSPACE="10"  title="Herramientas"/>Herramientas</a>

<ul>
     <li>
        <a href="<?= base_url('vendedores/'); ?>">
        <img src="<?=base_url('assets/imagenes/lista.jpg');?>"align="left" WIDTH=20 HEIGHT=20 HSPACE="10"  title=""/>Lista Vendedor  
        </a> 
     <li>
      <a href="<?= base_url('login/logout'); ?>">
      <img src="<?=base_url('assets/imagenes/salida.jpg');?>"align="left" WIDTH=20 HEIGHT=20 HSPACE="10"  title="Salida"/>Salida  
      </a>
    </li>
    </li>
</ul>

        <?php if($this->session->userdata('admin')==1): ?>
        <?php endif; ?> 
    

</a>
  </li>
</ul>
</body>
<br>

<div class="datagrid">
<table>
<thead>

		<th> Vendedor </th>
		<th> Fecha Visita </th>
    <th> Visitas </th>
    <th> Detalles </th>
    </tr>
</thead>

<tbody>

 <tbody>
    <?php
        
        foreach($aVendedores as $aItem){
             $aItem->datos_general->get();
             
             $cita= new Cita();
             $fecha_actual=date("Y/m/d",now());
             $datos= $cita->where(array('user_id' => $aItem->id,
                                'fecha_visita'=> $fecha_actual))->get();       
             
            
            //$FECHA= 'SELECT DATE(`fecha_v`) , COUNT( * ) FROM  `clientes` GROUP BY DATE(  `fecha_v` )';
            echo '<tr>';
              echo '<td>'.$aItem->datos_general->nombre." ".$aItem->datos_general->apellido_p." ".$aItem->datos_general->apellido_m.'</td>';
              echo '<td>'.$fecha_actual.'</td>';
              echo '<td align="center">'.$datos->count('cliente_id').'<td>';
              echo '<td>'.'<form method="post" action="detalle/1/<?= $id_vendedor ?>"/>'.'<input  type="submit" value="Detalle" title="Detalle" />'.'</td>';
            echo '</tr>';
           }

        
    ?>

</tbody>
</table>
</body>
</div>
</div>