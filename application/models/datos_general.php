<?php
defined("BASEPATH") OR exit("El acceso directo al script no está permitido!!!");

//la clase se escribe en singular, en cambio la tabla en plural
//debemos extender de datamapper
class Datos_general extends DataMapper
{

	public $table = 'datos_generales';

	public $has_many = array('cliente','usuario','citas');

}