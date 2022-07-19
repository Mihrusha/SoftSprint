<?php

namespace App\Model;

use App\Core\Database;

class User extends Model
{

    public const TABLE = 'users';
    public  $name;
    public  $surname;
    //error
    public $status;
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
       // header("Location:index.php");

        
    }


    public  function EditStatus($id,$status)
    {
        //$db = new Database;
        
       
        $extract = implode(',', $id);
       
        $sql = "UPDATE  users SET status = '$status' WHERE id IN($id)";
        $db = Database::Instanse();
        $db->execute($sql);
       header('index.php');
        
    }

    public  function Edit($name=null,$surname=null,$role=null,$id=null,$status=null)
    {
        //$db = new Database;

        // var_dump($name,$surname,$role,$id);
        // die;

        $sql = "UPDATE  users SET role = '$role',name='$name',surname='$surname',status='$status' WHERE id=$id";
        $db = Database::Instanse();
        $db->execute($sql);
        
        
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