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
        //$db = new Database;

        $checkbox = $method;
        //var_dump($checkbox);
       
        //$extract = implode(',', $checkbox);

        $sql = "DELETE FROM users WHERE users.id = '$checkbox' ";
        $db = Database::Instanse();
        $db->execute($sql);
        header("Location:index.php");

        
    }


    public  function EditStatus($method,$status)
    {
        //$db = new Database;
        
        $checkbox = $method;
        //var_dump($checkbox);
       $status =$status;
        //$extract = implode(',', $checkbox);

        $sql = "UPDATE  users SET status = '$status' WHERE id=$checkbox";
        $db = Database::Instanse();
        $db->execute($sql);
        header("Location:index.php");
        
    }

    public  function Edit()
    {
        //$db = new Database;

        $checkbox = $_POST['check'];
        //var_dump($checkbox);
       $role = $_POST['select'];
       $name = $_POST['name'];
       $surname = $_POST['surname'];
        //$extract = implode(',', $checkbox);

        $sql = "UPDATE  users SET status = '$role',name='$name',surname='$surname' WHERE id=$checkbox";
        $db = Database::Instanse();
        $db->execute($sql);
        header("Location:index.php");
        
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