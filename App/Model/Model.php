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

    public function Insert()
    {
        //var_dump(get_object_vars($this));
        //die;
        $col = [];
        $val = [];
        $data = [];
        $prop = (get_object_vars($this));
        foreach ($prop as $row => $value) {
            $col[] = $row;
            $val[] = ":" . $row;
            $data[':' . $row] = $value;
        }

        $str = implode(',', $col);
        $val_str = implode(',', $val);

        $sql = 'INSERT INTO' . ' ' . static::TABLE . '(' . $str . ') VALUES (' . $val_str . ')';
        $db = Database::Instanse();
        $db->execute($sql, $data);
        $this->id=$db->lastId();
    }
}
