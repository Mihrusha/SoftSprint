<?php

use App\Controller\Controller;

include 'C:\xampp\htdocs\Soft\exercise\App\vendor\autoload.php';
$result;
$controller =  new Controller;
if(isset($_POST['insert'])){

    $result=$controller->Insert();
    return $result;
}

if(isset($_POST['edit'])){
    $result= $controller->Edit();
    return $result;
}

if(isset($_POST['edit_status'])){
    $result= $controller->editStatus();
    return $result;
}

if(isset($_POST['delete'])){
    $result= $controller->OneDelete();
    return $result;
}

if(isset($_POST['mass_delete'])){
    $result= $controller->massDelete();
    return $result;
}

if(isset($_POST['need_id'])){
    $result= $controller->idReturn();
    return $result;
}

?>