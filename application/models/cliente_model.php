<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cliente_model extends CI_Model {

   public function insert_cliente ($cliente_data)
   {
      
      $this->db->set("nombre",          $cliente_data['nombre']);
      $this->db->set("apellido_p",      $cliente_data['apat']);
      $this->db->set("apellido_m",      $cliente_data['amat']);
      $this->db->set("email",           $cliente_data['email']);
      $this->db->set("telefono",        $cliente_data['telefono']);
      $this->db->set("telefono2",       $cliente_data['telefono2']);
      $this->db->set("direccion",       $cliente_data['direccion']);
      $this->db->set("status", 1);
      $this->db->insert("datos_generales");
      $id_dg = $this->db->insert_id();

      $this->db->set("nombre", $cliente_data['usuario']);
      $this->db->set("id_usuarios", $this->session->userdata('id_user'));
      $this->db->set("cargo_cliente",   $cliente_data['cargo_del_cliente']);
      $this->db->set("giro_empresa",    $cliente_data['giro_de_la_empresa']);
      $this->db->set("status", 1);
      $this->db->set("id_datos_generales", $id_dg);
      $this->db->insert("clientes");
      $id_cliente = $this->db->insert_id();

      foreach($cliente_data['productos'] as $producto) {
        $this->db->set("id_producto", $producto);
        $this->db->set("id_cliente", $id_cliente);
        $this->db->insert('cliente_producto'); 
    }


      return true;
      
   }

   public function editar_clientes ($id_dg, $dg_data, $id_cliente, $cliente_data)
   {

      $this->db->where('id_datos_generales', $id_dg);
      $this->db->update('datos_generales', $dg_data);

      $this->db->where('id_cliente', $id_cliente);
      $this->db->update('clientes', $cliente_data);

      return true;
   }

   public function get_cliente ($id_cliente)
   {

      $this->db->select('clientes.nombre as empresa, clientes.*');
      $this->db->select('datos_generales.*');
      $this->db->where('clientes.id_cliente', $id_cliente);
      $this->db->join('datos_generales', 'datos_generales.id_datos_generales = clientes.id_datos_generales', 'left');
      $result = $this->db->get('clientes');

      return $result->result_array();

   }

   public function get_clientes ($id_user)
   {
      $this->db->select('clientes.nombre as empresa, clientes.*');
      $this->db->select('datos_generales.*');
      $this->db->where('clientes.id_usuarios', $id_user);
      $this->db->join('datos_generales', 'datos_generales.id_datos_generales = clientes.id_datos_generales', 'left');
      $result = $this->db->get('clientes');

print_r($result->result_array());exit();

      return $result->result_array();

   }

   public function get_productos()
   {

      $result = $this->db->get('catalogo_de_productos');

      return $result->result_array();

   }

}