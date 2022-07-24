<?php

use App\Controller\Controller;

include 'C:\xampp\htdocs\Soft\exercise\App\vendor\autoload.php';

$controller = new Controller;

if (isset($_POST['insert']))
{
    $result = $controller->Insert();

    echo $result;
}

if (isset($_POST['edit']))
{
    $result = $controller->Edit();

    echo $result;
}

if (isset($_POST['edit_status']))
{
    $result = $controller->editStatus();

    echo $result;
}

if (isset($_POST['delete']))
{
    $result = $controller->delete();

    echo $result;
}

if (isset($_POST['mass_delete']))
{
    $result = $controller->massDelete();

    echo $result;
}

$controller->Change();
?>