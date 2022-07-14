<?php

namespace App\Model;

use App\Core\Database;

class User extends Model
{

    public const TABLE = 'users';
    public  $name;
    public  $surname;
    //error
    // public $status;
     public $role;
     


     public  function Delete($method)
    {
        $db = new Database;

        $checkbox = $method;
        //var_dump($checkbox);
       
        //$extract = implode(',', $checkbox);

        $sql = "DELETE FROM users WHERE users.id = '$checkbox' ";
        $stmt = $db->conn->prepare($sql);
        $stmt->execute();

        
    }


    public  function EditStatus($method)
    {
        $db = new Database;

        $checkbox = $method;
        //var_dump($checkbox);
       $status = $_POST['choose'];
        //$extract = implode(',', $checkbox);

        $sql = "UPDATE  users SET status = '$status' WHERE id=$checkbox";
        $stmt = $db->conn->prepare($sql);
        $stmt->execute();

        
    }

    public static function GetAllLim()
    {
        
        $db = Database::Instanse();
        // $class=get_called_class();
        $sql = "SELECT * FROM users ";
        // $sql = "SELECT* FROM" . " " . static::TABLE ."LIMIT $method";
        $data = $db->Query($sql, [], static::class);
        return $data;
       
    }
}