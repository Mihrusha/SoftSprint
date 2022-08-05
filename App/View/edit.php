<?php


use App\Model\User;

include 'C:\xampp\htdocs\Soft\exercise\App\vendor\autoload.php';
$user = new User;

if (isset($_POST['name'])) {

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $role = $_POST['role'];
    $status = $_POST['status'];
    $id = $_POST['id'];
    $user->Edit($name, $surname, $role, $id, $status);
    echo json_encode(array('status' => true, 'error' => null, 'user' => array("id" => $id, "name" => $name, "surname" => $surname, 'role' => $role, 'status' => $status)));
    
}

if (isset($_POST['edit_status'])) {

   
    $status = $_POST['status'];
    $id = $_POST['id'];
 
   $result = $user->EditStatus( $id, $status);
  
     echo json_encode(array('status' => true, 'error' => null, 'user' => array("status" => $status)));
    
}
