<?php

use App\Model\User;
include 'C:\xampp\htdocs\Soft\exercise\App\vendor\autoload.php';
$user = new User;

if (isset($_POST['name'])) {

    $name = $_POST['name'];
 

    $surname = $_POST['surname'];
    

    $role = $_POST['role'];
    

    $status = $_POST['status'];
   

    

        $user->Insert($name, $surname, $status, $role);
    echo json_encode(array('status' => true, 'error' => null, 'user' => array("name" => $name, "surname" => $surname, 'role'=>$role, 'status'=>$status)));

    die;
}


?>