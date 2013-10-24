<?php
defined("BASEPATH") OR exit("El acceso directo al script no está permitido!!!");

//la clase se escribe en singular, en cambio la tabla en plural
//debemos extender de datamapper
class Usuario extends DataMapper
{

	public $table = 'usuarios';

    public $has_one = array('datos_general');

	public $has_many = array('cliente');

}