<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Producto_model extends CI_Model {

   public function insert_producto ($cliente_data)
   {
      
      $this->db->set("nombre", $cliente_data['nombre']);
      $this->db->set("status"  , 1);
      

      $this->db->set("nombre", $cliente_data['nombre']);
      $this->db->set("status", 1);
      $this->db->insert("catalogo_de_productos");

      return true;
      
   }

   public function editar_producto( $clipro_data, $id_producto)
   {

      $this->db->where('id', $id_producto);
      $this->db->update('cliente_producto', $clipro_data);

      return true;
   }

   public function get_producto ($id_producto)
   {

      $this->db->where('producto.id', $id_producto);
      $this->db->from('catalogo_de_productos');
      $this->db->join('catalogo_de_productos', 'catalogo_de_productos.id = clientes_producto.id_cliente', 'left');
      
      $result = $this->db->get();

      return $result->result_array();

   }

   public function get_productos ($id_nombre)
   {
      $this->db->where('catalogo_de_productos.id_producto', $id_nombre);
      $result = $this->db->get('catalogo_de_productos');

      return $result->result_array();

   }

}