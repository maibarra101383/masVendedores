<?php
defined("BASEPATH") OR exit("El acceso directo al script no está permitido!!!");

//la clase se escribe en singular, en cambio la tabla en plural
//debemos extender de datamapper
class Requerimiento extends DataMapper
{

   public $table = 'requerimientos';

    public $has_one = array('cliente_producto');

   

}