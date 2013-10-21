<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vendedor_model extends CI_Model {

	public function insert_vendedor ($user_data)
	{
		
		$this->db->set("nombre",     $user_data['nombre']);
		$this->db->set("apellido_p", $user_data['apat']);
		$this->db->set("apellido_m", $user_data['amat']);
		$this->db->set("email",      $user_data['email']);
		$this->db->set("telefono",   $user_data['telefono']);
		$this->db->set("telefono2",  $user_data['telefono2']);
		$this->db->set("direccion",  $user_data['direccion']);
		$this->db->set("status"  , 1);
		$this->db->insert("datos_generales");
		$id_dg = $this->db->insert_id();

        $this->db->set("usuario", $user_data['usuario']);
		$this->db->set("clave", $user_data['clave']);
		$this->db->set("status", 1);
		$this->db->set("id_datos_generales", $id_dg);
		$this->db->insert("usuarios");

		return true;
		
	}

	public function edit_vendedor ($id_dg, $dg_data, $id_user, $user_data)
	{

		$this->db->where('id_datos_generales', $id_dg);
		$this->db->update('datos_generales', $dg_data);

		$this->db->where('id_usuarios', $id_user);
		$this->db->update('usuarios', $user_data);

		return true;
	}

	public function get_vendedor ($id_user)
	{
		$this->db->where('usuarios.id_usuarios', $id_user);
		$this->db->from('usuarios');
		$this->db->join('datos_generales', 'datos_generales.id_datos_generales = usuarios.id_datos_generales', 'left');
		
		$result = $this->db->get();

		return $result->result_array();

	}
      
         public function get_vendedores ($id_user)
   {
      $this->db->where('usuarios.id_usuarios', $id_user);
      $this->db->from('usuarios');
      $this->db->join('datos_generales', 'datos_generales.id_datos_generales = usuarios.id_datos_generales', 'left');
	  
	  $result = $this->db->get();


     return $result->result_array();

}
}