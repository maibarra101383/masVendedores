<?php
defined("BASEPATH") OR exit("El acceso directo al script no está permitido!!!");

//la clase se escribe en singular, en cambio la tabla en plural
//debemos extender de datamapper
class Cliente extends DataMapper
{

	public $table = 'clientes';

    public $has_one = array('datos_general','usuario');

	public $has_many = array('producto');

}