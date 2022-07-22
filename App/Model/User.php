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


    public  function EditStatus($id, $status)
    {
        //$db = new Database;


        $extract = implode(',', $id);

        $sql = "UPDATE  users SET status = '$status' WHERE id IN($id)";
        $db = Database::Instanse();
        $db->execute($sql);
        header('index.php');
    }

    public  function Edit($name = null, $surname = null, $role = null, $id = null, $status = null)
    {
        //$db = new Database;

        // var_dump($name,$surname,$role,$id);
        // die;
        if ($id != null) {
            $sql = "UPDATE  users SET role = '$role',name='$name',surname='$surname',status='$status' WHERE id=$id";
            $db = Database::Instanse();
            $db->execute($sql);
        }
    }

    public static function GetOne($id)
    {

        $db = Database::Instanse();
        // $class=get_called_class();
        $sql = "SELECT * FROM users WHERE id='$id";
        // $sql = "SELECT* FROM" . " " . static::TABLE ."LIMIT $method";
        $data = $db->Query($sql, [], static::class);
        return $data;
    }

    public function Insert($name, $surname, $status, $role)
    {
        //var_dump(get_object_vars($this));

        // $location = 'index.php';
        //  $massage = "error";


        $db = new Database;
        $name = $db->conn->quote($name);
        $surname = $db->conn->quote($surname);
        $status = $db->conn->quote($status);
        $role = $db->conn->quote($role);

        $sql = "INSERT INTO users (name,surname,status,role) VALUES ($name,$surname,$status,$role)";

        $db->execute($sql);
    }

    public function Result($name, $surname, $status, $role, $id = null)
    {
        if ($id != null && !empty($id)) {
            $this->Edit($name, $surname, $role, $id, $status);
        }
        if ($id == null && empty($id)) {
            $this->Insert($name, $surname, $status, $role);
        }
    }

    public function check_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function UserCheck($id)
    {

        $stmt = $this->conn->prepare("SELECT name,surname FROM users WHERE  id=:id");
       
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "exists!";
            return 1;
        } else {
            //echo "non existant";
            return 0;
        }
    }
}
