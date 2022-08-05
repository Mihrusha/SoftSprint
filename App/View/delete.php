<?php

use App\Model\User;
include 'C:\xampp\htdocs\Soft\exercise\App\vendor\autoload.php';
$user = new User;

// $data = $user->GetAll();

if (isset($_POST['deleteId'])) {
    $deleteId = $_POST['deleteId'];

    $deleteId = implode(',', $deleteId);
    $user->Delete($deleteId);
}

if (isset($_POST['mass_id'])) {

    $id = $_POST['mass_id'];

    $user->Delete($id);
}
