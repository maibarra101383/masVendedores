<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cliente_model extends CI_Model {

   public function insert_cliente ($cliente_data)
   {
      
      $this->db->set("nombre", $cliente_data['nombre']);
      $this->db->set("apellido_p", $cliente_data['apat']);
      $this->db->set("apellido_m", $cliente_data['amat']);
      $this->db->set("email", $cliente_data['email']);
      $this->db->set("telefono", $cliente_data['telefono']);
      $this->db->set("direccion", $cliente_data['direccion']);
      $this->db->set("status"  , 1);
      $this->db->insert("datos_generales");
      $id_dg = $this->db->insert_id();

      $this->db->set("nombre_cliente", $cliente_data['usuario']);
      $this->db->set("id_usuarios", $cliente_data['id_user']);
      $this->db->set("status", 1);
      $this->db->set("id_datos_generales", $id_dg);
      $this->db->insert("clientes");

      return true;
      
   }

   public function editar_clientes ($id_dg, $dg_data, $id_cliente, $cliente_data)
   {

      $this->db->where('id', $id_dg);
      $this->db->update('datos_generales', $dg_data);

      $this->db->where('id', $id_cliente);
      $this->db->update('clientes', $cliente_data);

      return true;
   }

   public function get_cliente ($id_cliente)
   {

      $this->db->where('clientes.id', $id_cliente);
      $this->db->from('clientes');
      $this->db->join('datos_generales', 'datos_generales.id = clientes.id_datos_generales', 'left');
      
      $result = $this->db->get();

      return $result->result_array();

   }

   public function get_clientes ($id_user)
   {
      $this->db->where('clientes.id_usuarios', $id_user);
      $result = $this->db->get('clientes');

      return $result->result_array();

   }

}