<?php

namespace App\Model;

use App\Core\Database;

abstract class Model
{
    public const TABLE = '';
    public $id;



    public static function GetAll()
    {
        $db = Database::Instanse();
        // $class=get_called_class();
       
        $sql = "SELECT* FROM" . " " . static::TABLE;
        $data = $db->Query($sql, [], static::class);
        return $data;
       
    }


    
}
