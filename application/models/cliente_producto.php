<?php
defined("BASEPATH") OR exit("El acceso directo al script no está permitido!!!");

//la clase se escribe en singular, en cambio la tabla en plural
//debemos extender de datamapper
class Cliente_producto extends DataMapper
{

   public $table = 'clientes_productos';

    public $has_one = array('requerimiento');

   

}